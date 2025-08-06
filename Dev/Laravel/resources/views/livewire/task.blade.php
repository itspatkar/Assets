<div>
    <input type="number" wire:model="num1">
    <input type="number" wire:model="num2">
    <input type="number" wire:model="num3" value="{{ $result }}">
    <input type="button">

    <br>
    <button wire:click="addNum">Submit</button>
</div>


<div>
    <button wire:click="addInputFields">Add</button>
    @foreach ($inputFields as $index => $values)
        <input type="text" wire:model="inputFields.{{ $index }}.field1" />
        <input type="text" wire:model="inputFields.{{ $index }}.field2" />
    @endforeach
    <button wire:click="saveInputFields">Save</button>
</div>
