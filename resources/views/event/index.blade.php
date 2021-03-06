<x-app-layout>
    <x-slot name="header">
        <h1 class="mt-4 ml-4 text-5xl text-p1 leading-tight">
            Évènements
        </h1>
    </x-slot>

    <x-view.links>
        @if($oldEvents)
        <x-view.link :href="route('event.index.olds')" text="Voir les anciens évènements" color="p2" bg="s2" hover="s3"/>
        @endif
        @authRole('admin')
        <x-view.link :href="route('event.create')" text="Ajouter un évènement" />
        @endauthRole
    </x-view.links>

    <div class="mx-2 sm:mx-auto sm:px-6 lg:px-8 max-w-7xl items-start grid grid-adaptive grid-cols-1 lg:grid-cols-2 auto-rows-auto gap-10">
    @foreach($events as $event)
        @can('participate', $event)
            <x-event.display links :event="$event"/>
        @endcan
    @endforeach
    </div>

    <x-view.section>
        {{$events->links()}}
    </x-view.section>
</x-app-layout>
