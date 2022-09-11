$table->id();
            $table->string("gal_name", 100);
            $table->integer('create_user_id');
            $table->string('name');
            $table->string('folder');
            $table->integer('dimx')->nullable();
            $table->integer('dimy')->nullable();
            $table->integer('is_video')->nullable();
            $table->timestamps();