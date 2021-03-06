<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-p1 leading-tight">
            Liste des types de visuels à télécharger
        </h2>
    </x-slot>

    <div class="flex flex-row flex-wrap max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        @foreach($events as $event)
        <x-view.section :title="$event->title" width="3" class="bg-s2">
            <div class="py-2">
                <x-view.link route="visual.laureat" :params="$event->hashid" text="Voir les visuels"/>
            </div>
        </x-view.section>
        @endforeach
    </div>
</x-app-layout>
