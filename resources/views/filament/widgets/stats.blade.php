<x-filament::widget>
    <x-filament::card>
        <!-- heading -->
        <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
          <h2 class="text-lg sm:text-xl font-bold tracking-tight">Users</h2>
        </div>
        <div class="icon-shape icon-md bg-light-primary text-primary
          rounded-2">
          <i class="bi bi-briefcase fs-4"></i>
        </div>
      </div>
      <!-- project number -->
      <div>
        <h1 class="text-lg sm:text-xl font-bold tracking-tight">{{ count($count) }}</h1>
      </div>
    </x-filament::card>
</x-filament::widget>
<x-filament::widget>
    <x-filament::card>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
              <h2 class="text-lg sm:text-xl font-bold tracking-tight">Product</h2>
            </div>
            <div class="icon-shape icon-md bg-light-primary text-primary
              rounded-2">
              <i class="bi bi-briefcase fs-4"></i>
            </div>
          </div>
          <!-- project number -->
          <div>
            <h1 class="text-lg sm:text-xl font-bold tracking-tight">{{ count($product) }}</h1>
        </div>
    </x-filament::card>
</x-filament::widget>
<x-filament::widget>
    <x-filament::card>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
              <h2 class="text-lg sm:text-xl font-bold tracking-tight">Category</h2>
            </div>
            <div class="icon-shape icon-md bg-light-primary text-primary
              rounded-2">
              <i class="bi bi-briefcase fs-4"></i>
            </div>
          </div>
          <!-- project number -->
          <div>
            <h1 class="text-lg sm:text-xl font-bold tracking-tight">{{ count($category) }}</h1>
        </div>
    </x-filament::card>
</x-filament::widget>