<?php
/**
 * @author Roberto Rielo <roberto910907@gmail.com>.
 *
 * @version laravel-database-designer
 */
declare(strict_types=1);

namespace DBDesigner\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use DBDesigner\Services\SchemaManager;

class SchemaController extends Controller
{
    public function __construct(private SchemaManager $schemaManager)
    {
        //...
    }

    public function list(): JsonResponse
    {
        return response()->json([
            'data' => $this->schemaManager->getTables(),
        ]);
    }
}
