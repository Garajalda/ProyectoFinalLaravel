<div class="card mt-3 mb-5">
    <div class="card-header">Live chat</div>
    <div class="card-body">
        <ul class="media-list" style="list-style: none;">
            
            @foreach($messages as $message)
            <li class="media">
                <div class="media-body">
                    <div class="media">
                            <a href="pull-left">
                                <img src="{{ $message->user->image_path }}" class="media-object img-circle" alt="" width="50">
                            </a>
                        <div class="media-body">
                            
                            {{ $message->message }}
                            <br>
                            <small class="text-muted">{{ $message->user->name }} a las {{ $message->created_at }}</small>
                            <hr>
                        </div>
                    </div>

                </div>
            </li>
            @endforeach
        </ul>
        <form action="/mensajes" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="incident_id" value="{{ $incident->id }}">
            <div class="input-group">
                <input type="text" class="form-control" name="message" id="">
                <button class="btn btn-success" type="submit">Enviar</button>
            </div>
        </form>
    </div>
</div>