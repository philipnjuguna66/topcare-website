<div>


    <ul class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">

        @foreach($tabs as $tab)


                <li class="mr-2">
                    <a href="#"  wire:click.prevent="$set('currentTeam', '{{ $tab->id }}')" aria-current="page" class="inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500">{{ $tab->name }}</a>
                </li>


        @endforeach

    </ul>





        @foreach($teams as $item)

            @dump($item)

            @include('templates.teams.director',['team' => $item])


        @endforeach

    <div class="mx-auto max-w-4xl text-center mt-2 flex justify-end">
        {{ $teams->links() }}
    </div>
</div>
