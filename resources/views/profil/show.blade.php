<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-p1 leading-tight">
            Profil
        </h2>
    </x-slot>
    <x-view.section class="bg-s2" width="3" :title="$user->name">
        @if(Auth::user()->id == $user->id)
        <x-view.link :href="route('profil.edit')" text="Modifier mon profil" />
        @endif
        <div class="quillContent">
            {{$user->bio}}
        </div>

    </x-view.section>

</x-app-layout>