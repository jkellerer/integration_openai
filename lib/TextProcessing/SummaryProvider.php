<?php

declare(strict_types=1);

namespace OCA\OpenAi\TextProcessing;

use Exception;
use OCA\OpenAi\AppInfo\Application;
use OCA\OpenAi\Service\OpenAiAPIService;
use OCA\OpenAi\Service\OpenAiSettingsService;
use OCP\IConfig;
use OCP\IL10N;
use OCP\TextProcessing\IProviderWithExpectedRuntime;
use OCP\TextProcessing\IProviderWithUserId;
use OCP\TextProcessing\SummaryTaskType;
use RuntimeException;

class SummaryProvider implements IProviderWithExpectedRuntime, IProviderWithUserId {
	public function __construct(
		private OpenAiAPIService $openAiAPIService,
		private IConfig $config,
		private IL10N $l10n,
		private ?string $userId,
		private OpenAiSettingsService $openAiSettingsService,
	) {
	}

	public function getName(): string {
		return $this->openAiAPIService->isUsingOpenAi()
			? $this->l10n->t('OpenAI integration')
			: $this->l10n->t('LocalAI integration');
	}

	public function process(string $prompt): string {
		// to try it out:
		// curl -H "content-type: application/json" -H "ocs-apirequest: true" -u user:pass http://localhost/dev/server/ocs/v2.php/textprocessing/schedule -d '{"input":"this is a short sentence to talk about food and weather and sport","type":"OCP\\TextProcessing\\SummaryTaskType","appId":"plopapp","identifier":"superidentifier"}' -X POST
		$adminModel = $this->config->getAppValue(Application::APP_ID, 'default_completion_model_id', Application::DEFAULT_COMPLETION_MODEL_ID) ?: Application::DEFAULT_COMPLETION_MODEL_ID;
		$prompt = 'Summarize the following text:' . "\n\n" . $prompt;
		// Max tokens are limited later to max tokens specified in the admin settings so here we just request PHP_INT_MAX
		try {
			if ($this->openAiAPIService->isUsingOpenAi() || $this->openAiSettingsService->getChatEndpointEnabled()) {
				$completion = $this->openAiAPIService->createChatCompletion($this->userId, $prompt, 1, $adminModel, PHP_INT_MAX, false);
			} else {
				$completion = $this->openAiAPIService->createCompletion($this->userId, $prompt, 1, $adminModel, PHP_INT_MAX, false);
			}
		} catch (Exception $e) {
			throw new RunTimeException('OpenAI/LocalAI request failed: ' . $e->getMessage());
		}
		if (count($completion) > 0) {
			return array_pop($completion);
		}

		throw new RunTimeException('No result in OpenAI/LocalAI response. ');

	}

	public function getTaskType(): string {
		return SummaryTaskType::class;
	}

	public function getExpectedRuntime(): int {
		return $this->openAiAPIService->isUsingOpenAi()
			? 10
			: 60 * 5;
	}

	public function setUserId(?string $userId): void {
		$this->userId = $userId;
	}
}
