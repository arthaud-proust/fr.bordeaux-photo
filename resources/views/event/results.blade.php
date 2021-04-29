<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-p1 leading-tight">
            Résultats de l'évènement "{{ $event->title }}"
        </h2>
    </x-slot>



    <x-view.links>
        @authRole('admin') <x-view.link :href="route('event.edit', $event->hashid)" text="Éditer l'évènement" /> @endauthRole
        <x-view.link :href="route('event.show', $event->hashid)" text="Retour à l'évènement" />
    </x-view.links>

    @if( ($podium[0] ?? false) && $event->voted )
    <x-view.section title="Le gagnant du concours est {{ $podium[0]->authorModel->name}}!"></x-view.section>

    <x-view.section title="Podium">
        <div class="flex flex-row flex-wrap justify-center items-end">
            @if( $podium[1] ?? false)
            <x-view.card width="4/12" :title="$podium[1]->title" :src="$podium[1]->photo">
                <x-slot name="title">
                    {{ $podium[1]->title }} par <x-view.link muted href="{{ route('profil.show', $podium[1]->author) }}" :text="$podium[1]->authorModel->name" />
                </x-slot>
            </x-view.card>
            @endif
            @if( $podium[0] ?? false)
            <x-view.card width="2/5" :title="$podium[0]->title" :src="$podium[0]->photo">
                <x-slot name="title">
                    {{ $podium[0]->title }} par <x-view.link muted href="{{ route('profil.show', $podium[0]->author) }}" :text="$podium[0]->authorModel->name" />
                </x-slot>
            </x-view.card>
            @endif
            @if( $podium[2] ?? false)
            <x-view.card width="3/12" :title="$podium[2]->title" :src="$podium[2]->photo">
                <x-slot name="title">
                    {{ $podium[2]->title }} par <x-view.link muted href="{{ route('profil.show', $podium[2]->author) }}" :text="$podium[2]->authorModel->name" />
                </x-slot>
            </x-view.card>
            @endif
        </div>
    </x-view.section>
    <x-view.section title="Résultats">
        <div class="flex flex-row flex-wrap">
            @foreach($results as $result) 
                <x-view.card width="full" :src="$result->photo">
                    <x-slot name="title">
                        {{ $result->title }} par <x-view.link muted href="{{ route('profil.show', $result->author) }}" :text="$result->authorModel->name" />
                    </x-slot>
                </x-view.card>

            @endforeach
        </div>
        {{$results->links()}}
    </x-view.section>
    @else
    <x-view.section title="Les résultats seront affichés une fois que tous les jurys auront voté"></x-view.section>
    @endif
    

    
</x-app-layout>
