@if ($graduates->count() > 0)
<div class="flex space-x-1 justify-around">
    <table>
        <thead>
            <tr>
                <th>Carrera</th>
                <th>Nivel</th>
                <th class="text-center">Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($graduates as $graduate)
            <tr>
                <td>{{ $graduate->career }}</td>
                <td>{{ $graduate->level }}</td>
                <td class="text-center">{{ $graduate->total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@else
<div class="flex justify-center">
    <p class="text-gray-500">Esta empresa no tiene egresados trabajando con ellos</p>
</div>
@endif