<div class="form-check">
    <label class="form-check-label">
        <input class="form-check-input" type="radio" name="language" id="exampleRadios1" value="English"
            @if ($entry != 'none')
                {{($entry->language == 'English') ? 'checked' : ''}}
            @else
                checked
            @endif
        >
        English
    </label>
</div>
<div class="form-check">
    <label class="form-check-label">
        <input class="form-check-input" type="radio" name="language" id="exampleRadios2" value="German"
            @if ($entry != 'none')
                {{($entry->language == 'German') ? 'checked' : ''}}
            @endif
        >
        German
    </label>
</div>
<div class="form-check">
    <label class="form-check-label">
        <input class="form-check-input" type="radio" name="language" id="exampleRadios3" value="French"
            @if ($entry != 'none')
                {{($entry->language == 'French') ? 'checked' : ''}}
            @endif
        >
        French
    </label>
</div>
