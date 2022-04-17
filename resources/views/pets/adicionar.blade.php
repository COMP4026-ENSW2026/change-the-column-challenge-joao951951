Adicionar novo pet:

<form action="/pets" method="post">
    @csrf

    <label for="name">Nome</label>
    <input id="name" name="name" type="text" /> <br/>

    <label for="color">Cor</label>
    <input id="color" name="color" type="text" /> <br/>

    <label for="specie">Especie</label>
    <input id="specie" name="specie" type="text" /> <br/>
    <label for="SubSpecies">SubSpecie</label>
    <input id="SubSpecies" name="SubSpecies" type="text" /> <br/>

    <label for="size">Size</label>
    <select name="size" id="size">
        <option value="xs">XS</option>
        <option value="sm">SM</option>
        <option value="m">M</option>
        <option value="l">L</option>
        <option value="xl">XL</option>
    </select>

    <label for="SizeM">Size Medida</label>
    <input id="SizeM" name="SizeM" type="text"/> <br/>
    <br/>
    <button type="submit">
        Cadastrar
    </button>
</form>

<a href="/pets">Voltar</a>
