<?php

use App\Enums\Theme\Button\ButtonRadiusSize;
use App\Enums\Theme\Button\ButtonType;
use App\Models\ThemeButton;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->string('bg_color')->default('#fff');
            $table->string('bg_img')->nullable();
            $table->string('color')->default('#000');
            $table->string('name');
            $table->string('button_type')->default(ButtonType::FILLED->value);
            $table->string('button_radius_size')->default(ButtonRadiusSize::NONE->value);
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
        Schema::dropIfExists('themes');
    }
};
