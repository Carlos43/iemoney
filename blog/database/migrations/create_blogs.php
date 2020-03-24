<?php
Schema::create('blogs', function (Blueprint $table) {
    $table->increments('id');
    $table->string('title');
    $table->text('content');
    $table->timestamps();
});
