<?php

namespace OCA\OpenAi\Settings;

use OCA\OpenAi\AppInfo\Application;
use OCA\OpenAi\Service\OpenAiSettingsService;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Services\IInitialState;
use OCP\IConfig;
use OCP\Settings\ISettings;

class Admin implements ISettings {
	public function __construct(
		private IConfig $config,
		private IInitialState $initialStateService,
		private OpenAiSettingsService $openAiSettingsService,
	) {
	}

	/**
	 * @return TemplateResponse
	 */
	public function getForm(): TemplateResponse {


		$adminConfig = $this->openAiSettingsService->getAdminConfig();

		$this->initialStateService->provideInitialState('admin-config', $adminConfig);

		return new TemplateResponse(Application::APP_ID, 'adminSettings');
	}

	public function getSection(): string {
		return 'connected-accounts';
	}

	public function getPriority(): int {
		return 10;
	}
}
