<?php
/**
 * @author Roberto Rielo <roberto910907@gmail.com>.
 *
 * @version laravel-database-designer
 */
declare(strict_types=1);

namespace DBDesigner\Services;

use Doctrine\DBAL\Exception;
use DBDesigner\Models\Database;
use Doctrine\DBAL\Schema\Index;
use Doctrine\DBAL\Schema\Table;
use Doctrine\DBAL\Schema\Column;

class SchemaManager
{
    /**
     * @throws Exception
     *
     * @return array
     */
    public function getTables(): array
    {
        $database = new Database();

        $tablesSchema = collect($database->getConnection()->getDoctrineSchemaManager()->listTables());

        return $tablesSchema
            ->map(function (Table $table) {
                return [
                    'name' => $table->getName(),
                    'primaryKey' => $table->getPrimaryKey()?->getColumns()[0],
                    'columns' => collect($table->getColumns())->map(function (Column $column) {
                        return array_merge(
                            $column->toArray(),
                            [
                                'type' => $column->getType()->getName(),
                                'typeClass' => $column->getType()::class,
                            ]);
                    }),
                    'indexes' => collect($table->getIndexes())->map(function (Index $index) {
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
