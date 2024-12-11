<?php
/*
 * Copyright 2023 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * GENERATED CODE WARNING
 * Generated by gapic-generator-php from the file
 * https://github.com/googleapis/googleapis/blob/master/google/datastore/v1/datastore.proto
 * Updates to the above are reflected here through a refresh process.
 */

namespace Google\Cloud\Datastore\V1\Client;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\Datastore\V1\AllocateIdsRequest;
use Google\Cloud\Datastore\V1\AllocateIdsResponse;
use Google\Cloud\Datastore\V1\BeginTransactionRequest;
use Google\Cloud\Datastore\V1\BeginTransactionResponse;
use Google\Cloud\Datastore\V1\CommitRequest;
use Google\Cloud\Datastore\V1\CommitResponse;
use Google\Cloud\Datastore\V1\Key;
use Google\Cloud\Datastore\V1\LookupRequest;
use Google\Cloud\Datastore\V1\LookupResponse;
use Google\Cloud\Datastore\V1\ReserveIdsRequest;
use Google\Cloud\Datastore\V1\ReserveIdsResponse;
use Google\Cloud\Datastore\V1\RollbackRequest;
use Google\Cloud\Datastore\V1\RollbackResponse;
use Google\Cloud\Datastore\V1\RunAggregationQueryRequest;
use Google\Cloud\Datastore\V1\RunAggregationQueryResponse;
use Google\Cloud\Datastore\V1\RunQueryRequest;
use Google\Cloud\Datastore\V1\RunQueryResponse;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Log\LoggerInterface;

/**
 * Service Description: Each RPC normalizes the partition IDs of the keys in its input entities,
 * and always returns entities with keys with normalized partition IDs.
 * This applies to all keys and entities, including those in values, except keys
 * with both an empty path and an empty or unset partition ID. Normalization of
 * input keys sets the project ID (if not already set) to the project ID from
 * the request.
 *
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods.
 *
 * @method PromiseInterface<AllocateIdsResponse> allocateIdsAsync(AllocateIdsRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<BeginTransactionResponse> beginTransactionAsync(BeginTransactionRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<CommitResponse> commitAsync(CommitRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<LookupResponse> lookupAsync(LookupRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<ReserveIdsResponse> reserveIdsAsync(ReserveIdsRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<RollbackResponse> rollbackAsync(RollbackRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<RunAggregationQueryResponse> runAggregationQueryAsync(RunAggregationQueryRequest $request, array $optionalArgs = [])
 * @method PromiseInterface<RunQueryResponse> runQueryAsync(RunQueryRequest $request, array $optionalArgs = [])
 */
final class DatastoreClient
{
    use GapicClientTrait;

    /** The name of the service. */
    private const SERVICE_NAME = 'google.datastore.v1.Datastore';

    /**
     * The default address of the service.
     *
     * @deprecated SERVICE_ADDRESS_TEMPLATE should be used instead.
     */
    private const SERVICE_ADDRESS = 'datastore.googleapis.com';

    /** The address template of the service. */
    private const SERVICE_ADDRESS_TEMPLATE = 'datastore.UNIVERSE_DOMAIN';

    /** The default port of the service. */
    private const DEFAULT_SERVICE_PORT = 443;

    /** The name of the code generator, to be included in the agent header. */
    private const CODEGEN_NAME = 'gapic';

    /** The default scopes required by the service. */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/cloud-platform',
        'https://www.googleapis.com/auth/datastore',
    ];

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' => self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' => __DIR__ . '/../resources/datastore_client_config.json',
            'descriptorsConfigPath' => __DIR__ . '/../resources/datastore_descriptor_config.php',
            'gcpApiConfigPath' => __DIR__ . '/../resources/datastore_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' => __DIR__ . '/../resources/datastore_rest_client_config.php',
                ],
            ],
        ];
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *     Optional. Options for configuring the service API wrapper.
     *
     *     @type string $apiEndpoint
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'datastore.googleapis.com:443'.
     *     @type string|array|FetchAuthTokenInterface|CredentialsWrapper $credentials
     *           The credentials to be used by the client to authorize API calls. This option
     *           accepts either a path to a credentials file, or a decoded credentials file as a
     *           PHP array.
     *           *Advanced usage*: In addition, this option can also accept a pre-constructed
     *           {@see \Google\Auth\FetchAuthTokenInterface} object or
     *           {@see \Google\ApiCore\CredentialsWrapper} object. Note that when one of these
     *           objects are provided, any settings in $credentialsConfig will be ignored.
     *     @type array $credentialsConfig
     *           Options used to configure credentials, including auth token caching, for the
     *           client. For a full list of supporting configuration options, see
     *           {@see \Google\ApiCore\CredentialsWrapper::build()} .
     *     @type bool $disableRetries
     *           Determines whether or not retries defined by the client configuration should be
     *           disabled. Defaults to `false`.
     *     @type string|array $clientConfig
     *           Client method configuration, including retry settings. This option can be either
     *           a path to a JSON file, or a PHP array containing the decoded JSON data. By
     *           default this settings points to the default client config file, which is
     *           provided in the resources folder.
     *     @type string|TransportInterface $transport
     *           The transport used for executing network requests. May be either the string
     *           `rest` or `grpc`. Defaults to `grpc` if gRPC support is detected on the system.
     *           *Advanced usage*: Additionally, it is possible to pass in an already
     *           instantiated {@see \Google\ApiCore\Transport\TransportInterface} object. Note
     *           that when this object is provided, any settings in $transportConfig, and any
     *           $apiEndpoint setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'grpc' => [...],
     *               'rest' => [...],
     *           ];
     *           See the {@see \Google\ApiCore\Transport\GrpcTransport::build()} and
     *           {@see \Google\ApiCore\Transport\RestTransport::build()} methods for the
     *           supported options.
     *     @type callable $clientCertSource
     *           A callable which returns the client cert as a string. This can be used to
     *           provide a certificate and private key to the transport layer for mTLS.
     *     @type false|LoggerInterface $logger
     *           A PSR-3 compliant logger. If set to false, logging is disabled, ignoring the
     *           'GOOGLE_SDK_PHP_LOGGING' environment flag
     * }
     *
     * @throws ValidationException
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
    }

    /** Handles execution of the async variants for each documented method. */
    public function __call($method, $args)
    {
        if (substr($method, -5) !== 'Async') {
            trigger_error('Call to undefined method ' . __CLASS__ . "::$method()", E_USER_ERROR);
        }

        array_unshift($args, substr($method, 0, -5));
        return call_user_func_array([$this, 'startAsyncCall'], $args);
    }

    /**
     * Allocates IDs for the given keys, which is useful for referencing an entity
     * before it is inserted.
     *
     * The async variant is {@see DatastoreClient::allocateIdsAsync()} .
     *
     * @example samples/V1/DatastoreClient/allocate_ids.php
     *
     * @param AllocateIdsRequest $request     A request to house fields associated with the call.
     * @param array              $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return AllocateIdsResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function allocateIds(AllocateIdsRequest $request, array $callOptions = []): AllocateIdsResponse
    {
        return $this->startApiCall('AllocateIds', $request, $callOptions)->wait();
    }

    /**
     * Begins a new transaction.
     *
     * The async variant is {@see DatastoreClient::beginTransactionAsync()} .
     *
     * @example samples/V1/DatastoreClient/begin_transaction.php
     *
     * @param BeginTransactionRequest $request     A request to house fields associated with the call.
     * @param array                   $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return BeginTransactionResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function beginTransaction(BeginTransactionRequest $request, array $callOptions = []): BeginTransactionResponse
    {
        return $this->startApiCall('BeginTransaction', $request, $callOptions)->wait();
    }

    /**
     * Commits a transaction, optionally creating, deleting or modifying some
     * entities.
     *
     * The async variant is {@see DatastoreClient::commitAsync()} .
     *
     * @example samples/V1/DatastoreClient/commit.php
     *
     * @param CommitRequest $request     A request to house fields associated with the call.
     * @param array         $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return CommitResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function commit(CommitRequest $request, array $callOptions = []): CommitResponse
    {
        return $this->startApiCall('Commit', $request, $callOptions)->wait();
    }

    /**
     * Looks up entities by key.
     *
     * The async variant is {@see DatastoreClient::lookupAsync()} .
     *
     * @example samples/V1/DatastoreClient/lookup.php
     *
     * @param LookupRequest $request     A request to house fields associated with the call.
     * @param array         $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return LookupResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function lookup(LookupRequest $request, array $callOptions = []): LookupResponse
    {
        return $this->startApiCall('Lookup', $request, $callOptions)->wait();
    }

    /**
     * Prevents the supplied keys' IDs from being auto-allocated by Cloud
     * Datastore.
     *
     * The async variant is {@see DatastoreClient::reserveIdsAsync()} .
     *
     * @example samples/V1/DatastoreClient/reserve_ids.php
     *
     * @param ReserveIdsRequest $request     A request to house fields associated with the call.
     * @param array             $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return ReserveIdsResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function reserveIds(ReserveIdsRequest $request, array $callOptions = []): ReserveIdsResponse
    {
        return $this->startApiCall('ReserveIds', $request, $callOptions)->wait();
    }

    /**
     * Rolls back a transaction.
     *
     * The async variant is {@see DatastoreClient::rollbackAsync()} .
     *
     * @example samples/V1/DatastoreClient/rollback.php
     *
     * @param RollbackRequest $request     A request to house fields associated with the call.
     * @param array           $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return RollbackResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function rollback(RollbackRequest $request, array $callOptions = []): RollbackResponse
    {
        return $this->startApiCall('Rollback', $request, $callOptions)->wait();
    }

    /**
     * Runs an aggregation query.
     *
     * The async variant is {@see DatastoreClient::runAggregationQueryAsync()} .
     *
     * @example samples/V1/DatastoreClient/run_aggregation_query.php
     *
     * @param RunAggregationQueryRequest $request     A request to house fields associated with the call.
     * @param array                      $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return RunAggregationQueryResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function runAggregationQuery(RunAggregationQueryRequest $request, array $callOptions = []): RunAggregationQueryResponse
    {
        return $this->startApiCall('RunAggregationQuery', $request, $callOptions)->wait();
    }

    /**
     * Queries for entities.
     *
     * The async variant is {@see DatastoreClient::runQueryAsync()} .
     *
     * @example samples/V1/DatastoreClient/run_query.php
     *
     * @param RunQueryRequest $request     A request to house fields associated with the call.
     * @param array           $callOptions {
     *     Optional.
     *
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return RunQueryResponse
     *
     * @throws ApiException Thrown if the API call fails.
     */
    public function runQuery(RunQueryRequest $request, array $callOptions = []): RunQueryResponse
    {
        return $this->startApiCall('RunQuery', $request, $callOptions)->wait();
    }
}
