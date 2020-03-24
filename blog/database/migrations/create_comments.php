<?php
Schema::create('comments', function (Blueprint $table) {
    $table->increments('id');
    $table->string('content');
    $table->integer('blog_id'); //这条评论是针对哪一篇博客的？
    $table->integer('user_id'); //这条评论是哪一位用户发送的？
    $table->timestamps();
});

