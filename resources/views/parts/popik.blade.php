<div id="popik" class="popik">
    <div id="btn_pencil" class="popik__pencil"></div>
    <a id="btn_basket" class="popik__basket" href=""></a>
    <div id="btn_close" class="popik__close"></div>
    <h3 id="popik_title" class="popik__title">Карточка</h3>

    {{-- карточка продукта --}}
    <table id="popik__table" class="popik__table">
        <tr>
            <td>Артикул</td>
            <td id="product_article">mtokb2</td>
        </tr>
        <tr>
            <td>Название</td>
            <td id="product_name">MTOK-B2/216-1KT3645-K</td>
        </tr>
        <tr>
            <td>Статус</td>
            <td id="product_status">Доступен</td>
        </tr>
        <tr>
            <td>Данные</td>
            <td id="product_data">
                Цвет: Черный
                Размер: L
            </td>
        </tr>
    </table>
    {{-- //карточка продукта --}}

    {{-- форма добавления и редактирования --}}
    <form action="" method="post" class="form" id="form">
        @csrf
        <input name="id" id="input_id" type="hidden" value="">

        <label for="input_article">Артикул</label>
        <input name="article" id="input_article" type="text" value="{{ old('article') }}" required>

        <label for="input_name">Название</label>
        <input name="name" id="input_name" type="text" value="{{ old('name') }}" required>

        <label for="input_status">Статус</label>
        <div class="form__select">
            <div id="arrow" class="form__arrow"></div>
            <input name="status" id="input_status" class="" type="text" readonly value="{{ old('status') }}" required>
            <ul id="options" class="form__options hidden">
                <li>Доступен</li>
                <li>Не доступен</li>
            </ul>
        </div>

        <h5>Атрибуты</h5>

        <div id="form__rows" class="form__rows">
            <div class="form__row hidden">
                <div>
                    <label for="">Название</label>
                    <input name="attr_name[]" class="attr_name" type="text" required>
                </div>
                <div>
                    <label for="">Значение</label>
                    <input name="attr_value[]" class="attr_value" type="text" required>
                </div>
                <div class="form__basket"></div>
            </div>
        </div>


        <span id="add_attr">+ Добавить атрибут</span>
        <button id="btn_form" type="submit" class="btn btn_relative">Добавить</button>

    </form>
    {{-- // форма --}}

</div>
