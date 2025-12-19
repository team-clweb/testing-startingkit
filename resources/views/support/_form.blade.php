<div class="flex justify-start w-full mt-10 items-start md:ml-32">
    {{ html()->form('POST', route('support.store'))->class('space-y-4 w-1/2 ml-10')->open() }}

    <div class="flex flex-col md:space-x-4 md:flex-row md:space-y-0 space-y-4">
        <div class="flex flex-col w-full md:w-1/3">
          @error('firstname')
          <div class="text-red-600">{{ $message }}</div>
          @enderror
          {{ html()->text('firstname')->class('border border-gray-400 rounded p-2')->placeholder('Voornaam')->required()}}
        </div>

        <div class="flex flex-col w-full md:w-1/3">
          @error('infix')
          <div class="text-red-600">{{ $message }}</div>
          @enderror
          {{ html()->text('infix')->class('border border-gray-400 rounded p-2')->placeholder('Tussenvoegsel')}}
        </div>

        <div class="flex flex-col w-full md:w-1/3">
          @error('lastname')
          <div class="text-red-600">{{ $message }}</div>
          @enderror
          {{ html()->text('lastname')->class('border border-gray-400 rounded p-2')->placeholder('Achternaam')->required()}}
        </div>
    </div>

    @error('email')
    <div class="text-red-600">{{ $message }}</div>
    @enderror
    {{ html()->email('email')->class('w-full border border-gray-400 rounded p-2')->placeholder('Email')->required()}}

    @error('message')
    <div class="text-red-600">{{ $message }}</div>
    @enderror
    {{ html()->textarea('message')->class('w-full h-32 border border-gray-400 rounded p-2')->placeholder('Bericht')->required()}}

    <button type="submit" class="bg-[#4B3A2F] text-white px-6 py-2 rounded">
        Verstuur
    </button>

    {{ html()->closeModelForm() }}

    <img src="/chef-man-cap.svg" class="h-44 mt-10 md:ml-32"/>
</div>
