use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('umkms', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('category_id')
                ->constrained()
                ->restrictOnDelete();

            $table->string('business_name');
            $table->string('slug')->unique();

            $table->text('description')->nullable();

            $table->string('phone', 20);

            $table->text('address');

            $table->string('village')->nullable();
            $table->string('district')->nullable();
            $table->string('regency')->nullable();

            $table->string('maps_url')->nullable();

            $table->string('logo')->nullable();
            $table->string('banner')->nullable();

            $table->enum('status', [
                'pending',
                'approved',
                'rejected'
            ])->default('pending');

            $table->boolean('is_active')->default(true);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('umkms');
    }
};
