<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('KPITB');
            $table->text('footer')->nullable();
            $table->string('mainLayoutType')->default('vertical');
            $table->string('theme')->default('light');
            $table->boolean('sidebarCollapsed')->default(false);
            $table->string('navbarColor')->default('bg-primary');
            $table->string('horizontalMenuType')->default('floating');
            $table->string('verticalMenuNavbarType')->default('floating');
            $table->string('footerType')->default('static');
            $table->string('layoutWidth')->default('boxed');
            $table->boolean('showMenu')->default(true);
            $table->string('bodyClass')->default('');
            $table->boolean('pageHeader')->default(true);
            $table->string('contentLayout')->default('default');
            $table->string('defaultLanguage')->default('en');
            $table->boolean('blankPage')->default(false);
            $table->string('direction')->default('ltr');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
