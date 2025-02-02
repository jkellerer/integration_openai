<?php
/**
 * @copyright Copyright (c) 2023, Sami Finnilä (sami.finnila@gmail.com)
 *
 * @author Sami Finnilä <sami.finnila@gmail.com>
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

namespace OCA\OpenAi\Service;

use Exception;
use OCA\OpenAi\AppInfo\Application;
use OCP\IConfig;

class OpenAiSettingsService {
	private const ADMIN_CONFIG_TYPES = [
		'request_timeout' => 'integer',
		'url' => 'string',
		'api_key' => 'string',
		'default_completion_model_id' => 'string',
		'max_tokens' => 'integer',
		'quota_period' => 'integer',
		'quotas' => 'array',
		'whisper_picker_enabled' => 'boolean',
		'image_picker_enabled' => 'boolean',
		'text_completion_picker_enabled' => 'boolean',
		'translation_provider_enabled' => 'boolean',
		'stt_provider_enabled' => 'boolean',
		'chat_endpoint_enabled' => 'boolean',
		'basic_user' => 'string',
		'basic_password' => 'string',
		'use_basic_auth' => 'boolean'
	];

	private const USER_CONFIG_TYPES = [
		'api_key' => 'string',
		'default_completion_model_id' => 'string',
		'basic_user' => 'string',
		'basic_password' => 'string',
	];


	public function __construct(private IConfig $config) {

	}

	////////////////////////////////////////////
	//////////// Getters for settings //////////

	/**
	 * @return string
	 */
	public function getAdminApiKey(): string {
		return $this->config->getAppValue(Application::APP_ID, 'api_key');
	}

	/**
	 * SIC! Does not fall back on the admin api by default
	 * @param null|string $userId
	 * @param boolean $fallBackOnAdminValue
	 * @return string
	 */
	public function getUserApiKey(?string $userId, bool $fallBackOnAdminValue = false): string {
		$fallBackApiKey = $fallBackOnAdminValue ? $this->getAdminApiKey() : '';
		$userApiKey = $userId === null ? $fallBackApiKey : ($this->config->getUserValue($userId, Application::APP_ID, 'api_key', $fallBackApiKey) ?: $fallBackApiKey);
		return $userApiKey;
	}

	/**
	 * @return string
	 */
	public function getAdminDefaultCompletionModelId(): string {
		return $this->config->getAppValue(Application::APP_ID, 'default_completion_model_id', Application::DEFAULT_COMPLETION_MODEL_ID) ?: Application::DEFAULT_COMPLETION_MODEL_ID;
	}

	/**
	 * @return string
	 */
	public function getServiceUrl(): string {
		return $this->config->getAppValue(Application::APP_ID, 'url', '');
	}

	/**
	 * @return int
	 */
	public function getRequestTimeout(): int {
		return intval($this->config->getAppValue(Application::APP_ID, 'request_timeout', strval(Application::OPENAI_DEFAULT_REQUEST_TIMEOUT))) ?: Application::OPENAI_DEFAULT_REQUEST_TIMEOUT;
	}

	/**
	 * @param string $userId
	 * @return string
	 */
	public function getLastImageSize(string $userId): string {
		return $this->config->getUserValue($userId, Application::APP_ID, 'last_image_size', Application::DEFAULT_IMAGE_SIZE) ?: Application::DEFAULT_IMAGE_SIZE;
	}

	/**
	 * @return int
	 */
	public function getMaxTokens(): int {
		return intval($this->config->getAppValue(Application::APP_ID, 'max_tokens', strval(Application::DEFAULT_MAX_NUM_OF_TOKENS))) ?: Application::DEFAULT_MAX_NUM_OF_TOKENS;
	}

	/**
	 * @return int
	 */
	public function getQuotaPeriod(): int {
		return intval($this->config->getAppValue(Application::APP_ID, 'quota_period', strval(Application::DEFAULT_QUOTA_PERIOD))) ?: Application::DEFAULT_QUOTA_PERIOD;
	}

	/**
	 * @return int[]
	 */
	public function getQuotas(): array {
		$quotas = json_decode($this->config->getAppValue(Application::APP_ID, 'quotas', json_encode(Application::DEFAULT_QUOTAS)) ?: json_encode(Application::DEFAULT_QUOTAS), true);
		// Make sure all quota types are set in the json encoded app value (in case new quota types are added in the future)
		if (count($quotas) !== count(Application::DEFAULT_QUOTAS)) {
			foreach (Application::DEFAULT_QUOTAS as $quotaType => $_) {
				if (!isset($quotas[$quotaType])) {
					$quotas[$quotaType] = Application::DEFAULT_QUOTAS[$quotaType];
				}
			}
			$this->config->setAppValue(Application::APP_ID, 'quotas', json_encode($quotas));
		}

		return $quotas;
	}

	/**
	 * @return boolean
	 */
	public function getChatEndpointEnabled(): bool {
		return $this->config->getAppValue(Application::APP_ID, 'chat_endpoint_enabled', '0') === '1';
	}

	/**
	 * @param string|null $userId
	 * @param bool $fallBackOnAdminValue
	 * @return string
	 */
	public function getUserBasicUser(?string $userId, bool $fallBackOnAdminValue = true): string {
		$fallBackBasicUser = $fallBackOnAdminValue ? $this->config->getAppValue(Application::APP_ID, 'basic_user', '') : '';
		$basicUser = $userId === null ? $fallBackBasicUser : ($this->config->getUserValue($userId, Application::APP_ID, 'basic_user', $fallBackBasicUser) ?: $fallBackBasicUser);
		return $basicUser;
	}

	/**
	 * @param string|null $userId
	 * @param bool $fallBackOnAdminValue
	 * @return string
	 */
	public function getUserBasicPassword(?string $userId, bool $fallBackOnAdminValue = true): string {
		$fallBackBasicPassword = $fallBackOnAdminValue ? $this->config->getAppValue(Application::APP_ID, 'basic_password', '') : '';
		$basicPassword = $userId === null ? $fallBackBasicPassword : ($this->config->getUserValue($userId, Application::APP_ID, 'basic_password', $fallBackBasicPassword) ?: $fallBackBasicPassword);
		return $basicPassword;
	}

	/**
	 * Get admin basic user
	 * @return string
	 */
	public function getAdminBasicUser(): string {
		return $this->config->getAppValue(Application::APP_ID, 'basic_user', '');
	}

	/**
	 * Get admin basic password
	 * @return string
	 */
	public function getAdminBasicPassword(): string {
		return $this->config->getAppValue(Application::APP_ID, 'basic_password', '');
	}

	/**
	 * @return boolean
	 */
	public function getUseBasicAuth(): bool {
		return $this->config->getAppValue(Application::APP_ID, 'use_basic_auth', '0') === '1';
	}

	/**
	 * Get the admin config for the settings page
	 * @return mixed[]
	 */
	public function getAdminConfig(): array {
		return [
			'request_timeout' => $this->getRequestTimeout(),
			'url' => $this->getServiceUrl(),
			'api_key' => $this->getAdminApiKey(),
			'default_completion_model_id' => $this->getAdminDefaultCompletionModelId(),
			'max_tokens' => $this->getMaxTokens(),
			// Updated to get max tokens
			'quota_period' => $this->getQuotaPeriod(),
			// Updated to get quota period
			'quotas' => $this->getQuotas(),
			// Get quotas from the config value and return it
			'whisper_picker_enabled' => $this->getWhisperPickerEnabled(),
			'image_picker_enabled' => $this->getImagePickerEnabled(),
			'text_completion_picker_enabled' => $this->getTextCompletionPickerEnabled(),
			'translation_provider_enabled' => $this->getTranslationProviderEnabled(),
			'stt_provider_enabled' => $this->getSttProviderEnabled(),
			'chat_endpoint_enabled' => $this->getChatEndpointEnabled(),
			'basic_user' => $this->getAdminBasicUser(),
			'basic_password' => $this->getAdminBasicPassword(),
			'use_basic_auth' => $this->getUseBasicAuth()
		];
	}

	/**
	 * Get the user config for the settings page
	 * @return string[]
	 */
	public function getUserConfig(string $userId): array {
		$isCustomService = $this->getServiceUrl() !== '' && $this->getServiceUrl() !== Application::OPENAI_API_BASE_URL;
		return [
			'api_key' => $this->getUserApiKey($userId),
			'basic_user' => $this->getUserBasicUser($userId, false),
			'basic_password' => $this->getUserBasicPassword($userId, false),
			'use_basic_auth' => $this->getUseBasicAuth(),
			'is_custom_service' => $isCustomService,

		];
	}

	/**
	 * @return bool
	 */
	public function getWhisperPickerEnabled(): bool {
		return $this->config->getAppValue(Application::APP_ID, 'whisper_picker_enabled', '1') === '1';
	}
	/**
	 * @return bool
	 */
	public function getImagePickerEnabled(): bool {
		return $this->config->getAppValue(Application::APP_ID, 'image_picker_enabled', '1') === '1';
	}
	/**
	 * @return bool
	 */
	public function getTextCompletionPickerEnabled(): bool {
		return $this->config->getAppValue(Application::APP_ID, 'text_completion_picker_enabled', '1') === '1';
	}
	/**
	 * @return bool
	 */
	public function getTranslationProviderEnabled(): bool {
		return $this->config->getAppValue(Application::APP_ID, 'translation_provider_enabled', '1') === '1';
	}
	/**
	 * @return bool
	 */
	public function getSttProviderEnabled(): bool {
		return $this->config->getAppValue(Application::APP_ID, 'stt_provider_enabled', '1') === '1';
	}

	/**
	 * @param string $userId
	 * @return string
	 */
	public function getUserDefaultCompletionModelId(string $userId): string {
		// Fall back on admin model setting if necessary:
		$adminModel = $this->getAdminDefaultCompletionModelId();
		return $this->config->getUserValue($userId, Application::APP_ID, 'default_completion_model_id', $adminModel) ?: $adminModel;
	}

	////////////////////////////////////////////
	//////////// Setters for settings //////////

	/**
	 * @param int[] $quotas
	 * @return void
	 * @throws Exception
	 */
	public function setQuotas(array $quotas): void {
		// Validate input
		if (count($quotas) !== count(Application::DEFAULT_QUOTAS)) {
			throw new Exception('Invalid number of quotas');
		}

		foreach ($quotas as $quotaType => $quota) {
			if (!isset(Application::DEFAULT_QUOTAS[$quotaType])) {
				throw new Exception('Invalid quota type(s)');
			}

			if (!is_int($quota) || $quota < 0) {
				throw new Exception('Invalid quota value');
			}
		}

		$this->config->setAppValue(Application::APP_ID, 'quotas', json_encode($quotas));
	}

	/**
	 * @param string $apiKey
	 * @return void
	 */
	public function setAdminApiKey(string $apiKey): void {
		// No need to validate. As long as it's a string, we're happy campers
		$this->config->setAppValue(Application::APP_ID, 'api_key', $apiKey);
	}

	/**
	 * @param string $userId
	 * @param string $apiKey
	 */
	public function setUserApiKey(string $userId, string $apiKey): void {
		// No need to validate. As long as it's a string, we're happy campers
		$this->config->setUserValue($userId, Application::APP_ID, 'api_key', $apiKey);
	}

	/**
	 * @param string $defaultCompletionModelId
	 * @return void
	 */
	public function setAdminDefaultCompletionModelId(string $defaultCompletionModelId): void {
		// No need to validate. As long as it's a string, we're happy campers
		$this->config->setAppValue(Application::APP_ID, 'default_completion_model_id', $defaultCompletionModelId);
	}

	/**
	 * @param string $userId
	 * @param string $defaultCompletionModelId
	 */
	public function setUserDefaultCompletionModelId(string $userId, string $defaultCompletionModelId): void {
		// No need to validate. As long as it's a string, we're happy campers
		$this->config->setUserValue($userId, Application::APP_ID, 'default_completion_model_id', $defaultCompletionModelId);
	}

	/**
	 * @param string $serviceUrl
	 * @return void
	 * @throws Exception
	 */
	public function setServiceUrl(string $serviceUrl): void {
		// Validate input:
		if (!filter_var($serviceUrl, FILTER_VALIDATE_URL) && $serviceUrl !== '') {
			throw new Exception('Invalid service URL');
		}
		$this->config->setAppValue(Application::APP_ID, 'url', $serviceUrl);
	}
	/**
	 * @param int $requestTimeout
	 * @return void
	 */
	public function setRequestTimeout(int $requestTimeout): void {
		// Validate input:
		$requestTimeout = max(1, $requestTimeout);
		$this->config->setAppValue(Application::APP_ID, 'request_timeout', $requestTimeout);
	}

	/**
	 * Setter for maxTokens; minimum is 100
	 * @param int $maxTokens
	 * @return void
	 */
	public function setMaxTokens(int $maxTokens): void {
		// Validate input:
		$maxTokens = max(100, $maxTokens);
		$this->config->setAppValue(Application::APP_ID, 'max_tokens', $maxTokens);
	}

	/**
	 * Setter for quotaPeriod; minimum is 1 day
	 * @param string $quotaPeriod
	 * @return void
	 */
	public function setQuotaPeriod(int $quotaPeriod): void {
		// Validate input:
		$quotaPeriod = max(1, $quotaPeriod);
		$this->config->setAppValue(Application::APP_ID, 'quota_period', $quotaPeriod);
	}

	/**
	 * @param string $basicUser
	 * @return void
	 */
	public function setAdminBasicUser(string $basicUser): void {
		$this->config->setAppValue(Application::APP_ID, 'basic_user', $basicUser);
	}

	/**
	 * @param string $basicPassword
	 * @return void
	 */
	public function setAdminBasicPassword(string $basicPassword): void {
		$this->config->setAppValue(Application::APP_ID, 'basic_password', $basicPassword);
	}

	/**
	 * @param string $userId
	 * @param string $basicUser
	 * @return void
	 */
	public function setUserBasicUser(string $userId, string $basicUser): void {
		$this->config->setUserValue($userId, Application::APP_ID, 'basic_user', $basicUser);
	}

	/**
	 * @param string $userId
	 * @param string $basicPassword
	 * @return void
	 */
	public function setUserBasicPassword(string $userId, string $basicPassword): void {
		$this->config->setUserValue($userId, Application::APP_ID, 'basic_password', $basicPassword);
	}

	/**
	 * @param bool $useBasicAuth
	 * @return void
	 */
	public function setUseBasicAuth(bool $useBasicAuth): void {
		$this->config->setAppValue(Application::APP_ID, 'use_basic_auth', $useBasicAuth ? '1' : '0');
	}

	/**
	 * Set the admin config for the settings page
	 * @param mixed[] $config
	 * @return void
	 * @throws Exception
	 */
	public function setAdminConfig(array $adminConfig): void {
		// That the variable types are correct
		foreach (array_keys($adminConfig) as $key) {
			if (gettype($adminConfig[$key]) !== self::ADMIN_CONFIG_TYPES[$key]) {
				throw new Exception('Invalid type for key: ' . $key . '. Expected ' . self::ADMIN_CONFIG_TYPES[$key] . ', got ' . gettype($adminConfig[$key]));
			}
		}

		// Validation of the input values is done in the individual setters
		if (isset($adminConfig['request_timeout'])) {
			$this->setRequestTimeout($adminConfig['request_timeout']);
		}
		if (isset($adminConfig['url'])) {
			$this->setServiceUrl($adminConfig['url']);
		}
		if (isset($adminConfig['api_key'])) {
			$this->setAdminApiKey($adminConfig['api_key']);
		}
		if (isset($adminConfig['default_completion_model_id'])) {
			$this->setAdminDefaultCompletionModelId($adminConfig['default_completion_model_id']);
		}
		if (isset($adminConfig['max_tokens'])) {
			$this->setMaxTokens($adminConfig['max_tokens']);
		}
		if (isset($adminConfig['quota_period'])) {
			$this->setQuotaPeriod($adminConfig['quota_period']);
		}
		if (isset($adminConfig['quotas'])) {
			$this->setQuotas($adminConfig['quotas']);
		}
		if (isset($adminConfig['whisper_picker_enabled'])) {
			$this->setWhisperPickerEnabled($adminConfig['whisper_picker_enabled']);
		}
		if (isset($adminConfig['image_picker_enabled'])) {
			$this->setImagePickerEnabled($adminConfig['image_picker_enabled']);
		}
		if (isset($adminConfig['text_completion_picker_enabled'])) {
			$this->setTextCompletionPickerEnabled($adminConfig['text_completion_picker_enabled']);
		}
		if (isset($adminConfig['translation_provider_enabled'])) {
			$this->setTranslationProviderEnabled($adminConfig['translation_provider_enabled']);
		}
		if (isset($adminConfig['stt_provider_enabled'])) {
			$this->setSttProviderEnabled($adminConfig['stt_provider_enabled']);
		}
		if (isset($adminConfig['chat_endpoint_enabled'])) {
			$this->setChatEndpointEnabled($adminConfig['chat_endpoint_enabled']);
		}
		if (isset($adminConfig['basic_user'])) {
			$this->setAdminBasicUser($adminConfig['basic_user']);
		}
		if (isset($adminConfig['basic_password'])) {
			$this->setAdminBasicPassword($adminConfig['basic_password']);
		}
		if (isset($adminConfig['use_basic_auth'])) {
			$this->setUseBasicAuth($adminConfig['use_basic_auth']);
		}
	}

	/**
	 * Set the user config for the settings page
	 * @param string $userId
	 * @param string[] $userConfig
	 */
	public function setUserConfig(string $userId, array $userConfig): void {
		// That the variable types are correct
		foreach (array_keys($userConfig) as $key) {
			if (gettype($userConfig[$key]) !== self::USER_CONFIG_TYPES[$key]) {
				throw new Exception('Invalid type for key: ' . $key . '. Expected ' . self::ADMIN_CONFIG_TYPES[$key] . ', got ' . gettype($userConfig[$key]));
			}
		}

		// Validation of the input values is done in the individual setters
		if (isset($userConfig['api_key'])) {
			$this->setUserApiKey($userId, $userConfig['api_key']);
		}
		if (isset($userConfig['default_completion_model_id'])) {
			$this->setUserDefaultCompletionModelId($userId, $userConfig['default_completion_model_id']);
		}
		if (isset($userConfig['basic_user'])) {
			$this->setUserBasicUser($userId, $userConfig['basic_user']);
		}
		if (isset($userConfig['basic_password'])) {
			$this->setUserBasicPassword($userId, $userConfig['basic_password']);
		}
	}

	/**
	 * @param bool $enabled
	 * @return void
	 */
	public function setWhisperPickerEnabled(bool $enabled): void {
		$this->config->setAppValue(Application::APP_ID, 'whisper_picker_enabled', $enabled ? '1' : '0');
	}
	/**
	 * @param bool $enabled
	 * @return void
	 */
	public function setImagePickerEnabled(bool $enabled): void {
		$this->config->setAppValue(Application::APP_ID, 'image_picker_enabled', $enabled ? '1' : '0');
	}
	/**
	 * @param bool $enabled
	 * @return void
	 */
	public function setTextCompletionPickerEnabled(bool $enabled): void {
		$this->config->setAppValue(Application::APP_ID, 'text_completion_picker_enabled', $enabled ? '1' : '0');
	}
	/**
	 * @param bool $enabled
	 * @return void
	 */
	public function setTranslationProviderEnabled(bool $enabled): void {
		$this->config->setAppValue(Application::APP_ID, 'translation_provider_enabled', $enabled ? '1' : '0');
	}
	/**
	 * @param bool $enabled
	 * @return void
	 */
	public function setSttProviderEnabled(bool $enabled): void {
		$this->config->setAppValue(Application::APP_ID, 'stt_provider_enabled', $enabled ? '1' : '0');
	}

	/**
	 * @param string $userId
	 * @param string $imageSize
	 * @return void
	 */
	public function setLastImageSize(string $userId, string $imageSize): void {
		$this->config->setUserValue($userId, Application::APP_ID, 'last_image_size', $imageSize);
	}

	/**
	 * @param bool $enabled
	 */
	public function setChatEndpointEnabled(bool $enabled): void {
		$this->config->setAppValue(Application::APP_ID, 'chat_endpoint_enabled', $enabled ? '1' : '0');
	}
}
