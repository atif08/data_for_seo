<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <?php

            $repeat = $data->keywords->pluck('repetition')->unique()->values();

            $grouped = collect($data->keywords->where('domain','www.facebookblueprint.com'))->mapToGroups(function ( $item, int $key) {
                return [$item['url'] => $item['rank_absolute']];
            });
            $website = [];
            $colorNames = array(
                "Red", "Blue", "Green", "Yellow", "Purple", "Orange",
                "Pink", "Brown", "Cyan", "Magenta", "Lime", "Teal",
                "Indigo", "Violet", "Azure", "Beige", "Crimson",
                "Silver", "Gold", "Maroon", "Olive", "Turquoise",
                "Slate", "Lavender", "Coral", "Periwinkle", "Plum",
                "Auburn", "Peach", "Mint", "Cerulean", "Ruby", "Ivory"
            );
            $randomColorName = $colorNames[array_rand($colorNames)];

            foreach ($grouped as $key => $value) {
                $website[] = [
                    'label' => $key,
                    'data' => $value->all(),
                    'fill' => false,
                    "borderColor" => $colorNames[array_rand($colorNames)]
                ];
            }

            ?>
            <canvas id="MyChart" style="height: 2000px"></canvas>


            <table id="example" class="table table-striped table-bordered bg-white overflow-hidden shadow-sm sm:rounded-lg" style="width:100%">
                <thead>
                <tr>
                    <th>Repetition</th>
                    <th>Type</th>
                    <th>Domain</th>
                    <th>Url</th>
                    <th>Position</th>
                    <th>Title</th>
                </tr>
                </thead>
                <tbody>

                @foreach($data->keywords as $search)
                <tr>
                    <td> {{$search->repetition}}</td>
                    <td>{{$search->type}}</td>
                    <td>{{$search->domain}}</td>
                    <td>{{$search->url}}</td>
                    <td>{{$search->position}}</td>
                    <td>{{$search->title}}</td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Keyword</th>
                    <th>Device</th>
                    <th>Location</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</x-app-layout>
<script>

    function createChart(){

        this.chart = new Chart("MyChart", {
            type: 'line', //this denotes tha type of chart

            data: {// values on X-Axis
                labels:<?=$repeat?>,
                datasets: <?=json_encode($website)?>
            },
            options: {
                aspectRatio:2.5
            }

        });
    }

    createChart();

</script>
