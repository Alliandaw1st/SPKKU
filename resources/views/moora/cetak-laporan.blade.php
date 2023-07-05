@extends('layouts.app')

@section('pageTitle')
    Laporan
@endsection

@section('content')
    <h2 class="text-center mt-3">Hasil Perhitungan Metode MOORA</h2>

    <div class="container border p-2 my-3">
        <table class="my-table">
            <thead style="border: 1px; background-color: lightgray;">
                <tr>
                    <th class="align-middle">Peringkat</th>
                    {{-- <th class="align-middle">Kode</th> --}}
                    <th class="align-middle">Alternatif</th>
                    <th class="align-middle">Nilai</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alternatifRanking as $index => $item)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        {{-- <td>
                            A{{ $index + 1 }}
                        </td> --}}
                        <td>
                            {{ $item['alternatif']->nama }}
                        </td>
                        <td>
                            {{ number_format($item['jumlah'], 6) }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>        
    </div>

    <script type="text/javascript">
        window.print();
    
        window.onafterprint = function() {
            window.close();
        }
    </script>

@endsection
