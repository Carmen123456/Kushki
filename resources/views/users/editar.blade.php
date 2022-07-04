
    <form action="{{ url('/User/' . $user->id) }}" method="post">
        @csrf
        {{ method_field('PATCH') }}

        <div class="mt-4">
            <label for="usuarios" class="form-label">Comercio
                <input style="background: white" class="form-control" readonly type="text"
                    value="{{ $user->name }}">
            </label>
            <select name="tipoUsu" id="tipoUsu" class="form-control">

                @foreach ($tipoUsu as $roles)
                    <option value="{{ $roles->id }}" @if ($roles->id == $user->roles()->first()->id) selected @endif>
                        {{ $roles->name }}
                    </option>
                @endforeach

            </select>

        </div>
        <input type="submit" value="Guardar datos">
    </form>

