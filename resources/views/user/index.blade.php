{{--
    @var array $users - Массив модели User
--}}

<form action="{{ route('user.store') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="name">
    <input type="email" name="email" placeholder="email">
    <input type="password" name="password" placeholder="password">

    <button type="submit">
         Отправить
    </button>

</form>



<table>
    <tr>
        <th>

        </th>
    </tr>

    @foreach($users as $user)
        <tr>

            <form action="{{ route('user.update', ['id' => $user['id']]) }}" method="POST">
                @csrf

                @foreach($user as $column => $item)
                    <td>
                        <label>
                            <input type="text" name="{{ $column }}" value="{{ $item }}">
                        </label>
                    </td>
                @endforeach

                <td>
                    <button type="submit">
                        Обновить
                    </button>
                </td>

            </form>

            <td>
                <form action="{{route('user.destroy', $user['id'])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Удалить</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
