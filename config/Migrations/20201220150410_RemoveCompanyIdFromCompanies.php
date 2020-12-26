<?php
use Migrations\AbstractMigration;

class RemoveCompanyIdFromCompanies extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('companies');
        $table->removeColumn('company_id');
        $table->update();
    }
}
