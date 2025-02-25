<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary(); // Laravel uses UUIDs for notifications
            $table->string('type'); // Notification type
            $table->morphs('notifiable'); // Stores the related model (user, admin, etc.)
            $table->text('data'); // JSON data for the notification
            $table->timestamp('read_at')->nullable(); // Mark when notification is read
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
    }
};
