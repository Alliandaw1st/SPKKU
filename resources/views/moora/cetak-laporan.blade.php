@extends('layouts.app')

@section('pageTitle')
    Laporan
@endsection

@section('content')
    {{-- <table>
        <tr>
            <td style="width: 80px;">
                <img src="{{ asset('image/Logo-Untan-Universitas-Tanjungpura.png') }}" width="80" height="80">
            </td>
            <td class="text-center">
                <h6 class="mb-0">KEMENTERIAN RISET, TEKNOLOGI DAN PENDIDIKAN TINGGI</h6>
                <h4 class="mb-0">UNIVERSITAS TANJUNGPURA</h4>
                <h5 class="mb-0">Biro Akademik dan Kemahasiswaan (BAK)</h5>
            </td>
        </tr>
        <tr class="m-0">
            <td colspan="4" class="text-center"><font size="2"><i>Jalan Prof. Dr. H. Hadari Nawawi Pontianak 78124</i></font></td>
        </tr>
        <tr>
            <td colspan="2">
                <hr class="my-0">
            </td>
        </tr>
    </table>   --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <img src="{{ asset('image/Logo-Untan-Universitas-Tanjungpura.png') }}" width="80" height="80" class="grayscale-img">
            </div>
            <div class="col-10 text-center">
                <h6 class="mb-0 font-weight-normal">KEMENTERIAN RISET, TEKNOLOGI DAN PENDIDIKAN TINGGI</h6>
                <h2 class="mb-0">UNIVERSITAS TANJUNGPURA</h2>
                <h5 class="mb-0 font-weight-normal">Biro Akademik dan Kemahasiswaan (BAK)</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center mt-1"><font size="3"><i>Jalan Prof. Dr. H. Hadari Nawawi Pontianak 78124. Telp. (0561) 74191 Kotak Pos 1049.</i></font></div>
        </div>
        <div class="row">
            <div class="col-12">
                <hr class="my-0">
            </div>
        </div>
    </div>      

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
