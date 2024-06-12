<?php

/**
 * @license Apache 2.0
 */

namespace Docs\Default;

use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     description="Laravel New API documentation",
 *     version="1.0.0",
 *     title="Laravel New API Documentation",
 *     termsOfService="http://swagger.io/terms/",
 *
 *     @OA\Contact(
 *         email="gabrieloliveiratech@gmail.com"
 *     ),
 *
 *     @OA\License(
 *         name="MIT",
 *         url="https://google.com"
 *     )
 * )
 *
 * @OA\Server(
 *     description="Laravel New API",
 *     url="https://baseurl/api"
 * )
 *
 * @OA\ExternalDocumentation(
 *     description="Find out more about Swagger",
 *     url="http://swagger.io"
 * )
 */
class Info
{
}
