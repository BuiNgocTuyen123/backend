<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameNameColumnInAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            // Đổi tên cột 'name' thành 'admin'
            $table->renameColumn('name', 'admin_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            // Đổi lại tên cột từ 'admin' thành 'name' trong trường hợp rollback migration
            $table->renameColumn('admin_name', 'name');
        });
    }
}
