<div>
    <table class="table align-middle caption-top table-striped">
        <caption>Tabela de <b>{{ $title }}</b></caption>
        <thead>
        <tr>
            @foreach ($header as $item)
                @if($item != 'id')
                    <th scope="col" class="d-none d-md-table-cell">{{ strtoupper($item) }}</th>
                @endif
            @endforeach

            <th scope="col">AÇÕES</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    @foreach ($header as $h)
                        @if($h != 'id')
                            @if($h == 'especialidade')
                                @foreach ($especialidades as $esp)
                                    <td class="d-none d-md-table-cell">{{ $esp }}</td>
                                    @if($esp->id == $item[$h])
                                    @endif
                                @endforeach
                            @else
                                <td class="d-none d-md-table-cell">{{ $item[$h] }}</td>
                            @endif
                        @endif
                    @endforeach
                    
                    <td>
                        <a href= "{{ route($crud.'.edit', $item->id) }}" class="btn btn-success">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"/>
                                <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"/>
                            </svg>
                        </a>
                        <a nohref style="cursor:pointer" onclick="showInfoModal('{{ $item[$header[1]] }}', '{{ $item[$header[2]] }}')" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                            </svg>
                        </a>
                        <a nohref style="cursor:pointer" onclick="showRemoveModal('{{ $item[$header[0]] }}', '{{ $item[$header[1]] }}')" class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                            </svg>
                        </a>
                    </td>
                    <form action="{{ route($crud.'.destroy', $item[$header[0]]) }}" method="POST" id="form_{{$item[$header[0]]}}">
                        @csrf
                        @method('DELETE')
                    </form>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>