<div>
  <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Planes</h3>
        <p class="mt-1 text-sm text-gray-600">
          Aquí puedes guardar los datos de cada plan de estudio
        </p>
      </div>
    </div>

    <div class="mt-5 md:mt-0 md:col-span-2">
      <form action="#" method="POST">
        <div class="shadow overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <x-label for="name">First Name</x-label>

                <x-input id="name" type="text" name="first_name" required autofocus />
              </div>

              <div class="col-span-6 sm:col-span-3">
                <x-label for="name">Last Name</x-label>

                <x-input id="last_name" type="text" name="last_name" required />
              </div>

              <div class="col-span-6 sm:col-span-4">
                <x-label for="email">Email adreess</x-label>

                <x-input id="email" type="text" name="email" required />
              </div>

              <div class="col-span-6 sm:col-span-3">
                <x-label for="country">Country / Region</x-label>

                <x-owns.select id="country" name="country" autocomplete="country" :options="$options"/>
              </div>

              <div class="col-span-6">
                <x-label for="address">Street address</x-label>

                <x-input id="address" type="text" name="address" required />
              </div>

              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <x-label for="city">City</x-label>

                <x-input id="city" type="text" name="city" required />
              </div>

              <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <x-label for="state">State / Province</x-label>

                <x-input id="state" type="text" name="state" required />
              </div>

              <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <x-label for="postal_code">ZIP / Postal</x-label>

                <x-input id="postal_code" type="text" name="postal_code" required />
              </div>
            </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <x-button>Guardar</x-button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
