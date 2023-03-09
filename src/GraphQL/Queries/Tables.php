<?php
/**
 * @author Roberto Rielo <roberto910907@gmail.com>.
 *
 * @package laravel-database-designer
 */

namespace DBDesigner\GraphQL\Queries;

use Exception;
use DBDesigner\Models\Database;
use Doctrine\DBAL\Schema\Index;
use Doctrine\DBAL\Schema\Table;
use Doctrine\DBAL\Schema\Column;

final class Tables
{
    /**
     * @param null $_
     * @param array{} $args
     *
     * @throws Exception
     *
     * @return array
     */
    public function __invoke($_, array $args): array
    {
        $database = new Database();

        $tablesSchema = collect($database->getConnection()->getDoctrineSchemaManager()->listTables());

        return $tablesSchema
            ->map(function (Table $table) {
                return [
                    'name' => $table->getName(),
                    'primaryKey' => $table->getPrimaryKey()?->getColumns()[0],
                    'columns' => collect($table->getColumns())->map(function (Column $column): array {
                        return array_merge(
                            $column->toArray(),
                            [
                                'type' => $column->getType()->getName(),
                                'typeClass' => $column->getType()::class,
                            ]);
                    }),
                    'indexes' => collect($table->getIndexes())->map(function (Index $index): array {
                        return [
                            'name' => $index->getName(),
                            'isPrimary' => $index->isPrimary(),
                            'isUnique' => $index->isUnique(),
                        ];
                    }),
                ];
            })
            ->toArray();
    }
}
