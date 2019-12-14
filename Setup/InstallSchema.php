<?php

namespace FME\News\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Adapter\AdapterInterface;

class InstallSchema implements InstallSchemaInterface {

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context) {
        $installer = $setup;
        $installer->startSetup();
        /**
         * Create table 'fme_news'
         */
        $table = $installer->getConnection()->newTable(
                        $installer->getTable('fme_news')
                )->addColumn(
                        'news_id',
                         \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                         null, 
                         ['identity' => true,
                          'nullable' => false, 
                          'primary' => true],
                          'News ID'

                )->addColumn(
                        'news_name', 
                         \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                         255,
                         ['nullable' => false],
                         'News Name'

                )->addColumn(
                        'news_start_date', 
                         \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 
                         255, 
                         ['nullable' => false],
                        'News Start Date'

                )->addColumn(
                        'news_end_date', 
                         \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                         255,
                         ['nullable' => false], 
                         'News End Date'

                )->addColumn(
                        'News_image',
                         \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                         255, 
                         ['nullable' => false],
                         'News Image'

                )->addColumn(
                        'News_content',
                         \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        '2M',
                         [], 
                        'News Content'

                )->addColumn(
                        'news_video',
                         \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                         255,
                         ['nullable' => false],
                         'News Video'

                )->addColumn(
                        'news_url_prefix',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                         255,
                         ['nullable' => false],
                         'Block String Identifier'

                )->addColumn(
                        'news_page_title',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 
                         255,
                         ['nullable' => false],
                        'News Title'

                )->addColumn(
                        'news_meta_keywords',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 
                        '2M',
                         [],
                        'News Meta Keywords'

                )->addColumn(
                        'news_meta_description', 
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                        '2M',
                         [],
                        'News Meta Description'

                )->addColumn(
                        'contact_name',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                         255,
                         ['nullable' => false],
                         'Contact Name'

                )->addColumn(
                        'contact_phone', 
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                         255, 
                         ['nullable' => false], 
                         'Contact Phone'

                )->addColumn(
                        'contact_fax',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                         255, 
                         ['nullable' => false],
                         'Contact Fax'

                )->addColumn(
                        'contact_email', 
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT, 
                         255,
                         ['nullable' => false], 
                         'Contact Email'

                )->addColumn(
                        'contact_address',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                         255,
                         ['nullable' => false],
                         'Contact Address'

                )->addColumn(
                        'identifier',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                         255,
                         ['nullable' => false],
                         'Block String Identifier'

                )->addColumn(
                        'creation_time',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP, 
                         null,
                         ['nullable' => false,
                         'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                         'News Creation Time'

                )->addColumn(
                        'update_time',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
                         null,
                         ['nullable' => false,
                         'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
                         'News Modification Time'

                )->addColumn(
                        'is_recurring',
                        \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                         null,
                         ['nullable' => false, 
                         'default' => '1'],
                         'Is News Recurring'

                )->addColumn(
                        'recurring_by', 
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                         255,
                         ['nullable' => false],
                         'Recurring By'

                )->addColumn(
                        'recurring_intervals',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                         255,
                         ['nullable' => false],
                         'Recurring Intervals'

                )->addColumn(
                        'recurring_occurrences',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                         255,
                         ['nullable' => false],
                         'Recurring Occurences'

                )->addColumn(
                        'recurring_on',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                         255,
                         ['nullable' => false], 
                         'Recurring On'

                )->addColumn(
                        'recurring_end_dates',
                         \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                         255,
                         ['nullable' => false],
                         'Recurring End Dates'

                )->addColumn(
                        'skip_date',
                        \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                         255, 
                         ['nullable' => false], 
                         'Skip Dates'

                )->addColumn(
                        'is_active',
                        \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
                         null, 
                         ['nullable' => false,
                         'default' => '1'], 
                         'Is News Active'

                )->addIndex(
                        $setup->getIdxName(
                                $installer->getTable('fme_news'), ['news_name', 'identifier'], AdapterInterface::INDEX_TYPE_FULLTEXT
                        ), ['news_name', 'identifier'], ['type' => AdapterInterface::INDEX_TYPE_FULLTEXT]
                )->setComment(
                'FME News Table'
        );
        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }

}
