<div class="row">
    <div class="col">
        <div class="input-group">
            <span class="input-group-text">https://127.0.0.1:8000/api/</span>
            <input type="text" class="form-control" id="input-url" value="pokemon">
        </div>
    </div>
</div>
<div class="row mb-3">
    <p class="small">Headers: <span class="text-danger">"x-api-key" : "KuKMQbgZPv0PRC6GqCMlDQ7fgdamsVY75FrQvHfoIbw4gBaG5UX0wfk6dugKxrtW"</span></p>
</div>
<div class="row mb-3">
    <div class="col-4">
        <div class="row">
            <div class="col-auto d-flex align-items-center">
                <input type="checkbox" id="checkbox-page">
                <label for="select-page" class="col-form-label ms-2">Page</label>
            </div>
            <div class="col">
                <select class="form-select" id="select-page" disabled>
                    <option value="1">1</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="row">
            <div class="col-auto d-flex align-items-center">
                <input type="checkbox" id="checkbox-limit">
                <label for="input-limit" class="col-form-label ms-2">Limit</label>
            </div>
            <div class="col">
                <input type="number" class="form-control" id="input-limit" min="10" value="20" disabled>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="row">
            <div class="col-auto d-flex align-items-center">
                <input type="checkbox" id="checkbox-sorting">
                <label for="select-sorting" class="col-form-label ms-2">Sorting</label>
            </div>
            <div class="col">
                <select class="form-select" id="select-sorting" disabled>
                    <option value="asc">asc</option>
                    <option value="desc">desc</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-auto d-flex align-items-center">
        <input type="checkbox" id="checkbox-search">
        <label for="input-search" class="col-form-label ms-2">Search</label>
    </div>
    <div class="col">
        <input type="text" class="form-control" id="input-search" value="pikachu" disabled>
    </div>
</div>
<div class="row">
    <div class="col">
        <label class="form-label" for="output-json">Output</label>
        <textarea class="form-control" id="output-json" style="height: 40vh; font-family:'Courier New';" readonly></textarea>
    </div>
</div>
