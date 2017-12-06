<div class="form-check">
    <label class="form-check-label">
        <input class="form-check-input" type="radio" name="language" id="exampleRadios1" value="English" {{($quote->language == 'English') ? 'checked' : ''}}>
        English
    </label>
</div>
<div class="form-check">
    <label class="form-check-label">
        <input class="form-check-input" type="radio" name="language" id="exampleRadios2" value="German" {{($quote->language == 'German') ? 'checked' : ''}}>
        German
    </label>
</div>
<div class="form-check">
    <label class="form-check-label">
        <input class="form-check-input" type="radio" name="language" id="exampleRadios3" value="French" {{($quote->language == 'French') ? 'checked' : ''}}>
        French
    </label>
</div>
