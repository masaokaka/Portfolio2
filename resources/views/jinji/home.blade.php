@extends('layouts.jinji')

@section('content')
<div class="container">
    <div class="row">
        <table>
            <h2>面談希望者一覧</h2>
            <tr>
                <th>氏名</th><th>大学</th><th>性別</th><th>マッチ件数</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user ->name }}</td>
                    <td>{{ $user ->university }}</td>
                    <td>
                        @if($user ->gender === "man")
                            男性
                        @else
                            女性
                        @endif
                    </td>
                    <td>0件</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
