window.onload = function () {
    let dataProduct = {}
    const actionDelete = '/deleteProduct/'
    const actionAdd = '/addProduct'
    const actionUpdate = '/updateProduct/'

    // данные товара в карточку товара
    const itemsRow = document.querySelectorAll('.items__row')
    itemsRow.forEach(row => row.addEventListener('click', function () {
        btn_pencil.style.display = 'block'
        btn_basket.style.display = 'block'
        form.style.display = 'none'
        let product = this.children
        dataProduct = {
            id: product[0].innerText,
            article: product[1].innerText,
            name: product[2].innerText,
            status: product[3].innerText,
            data: product[4].innerText
        }
        product_article.innerText = dataProduct.article
        product_name.innerText = dataProduct.name
        product_status.innerText = dataProduct.status
        product_data.innerText = dataProduct.data

        popik_title.textContent = dataProduct.name
        btn_basket.href = actionDelete + dataProduct.id

        popik__table.style.display = 'block'
        popik.style.display = 'block'
    }))

    // удаление продукта
    btn_basket.onclick = function () {
        popik.style.display = 'none'
    }

    // работа select формы
    const formOptions = document.querySelectorAll('.form__options li')
    arrow.onclick = function () {
        options.classList.toggle('hidden')
        input_status.classList.toggle('form__status_open')
    }
    formOptions.forEach(option => option.addEventListener('click', function () {
        input_status.setAttribute('value', option.innerText)
        options.classList.add('hidden')
        input_status.classList.toggle('form__status_open')
    }))

    // добавление строки аттрибутов
    let formRow = document.querySelector('.form__row')
    document.querySelector('.form__row').remove()
    let countAttr = 0
    add_attr.onclick = function () {
        addRowAttributes('', '')
    }
    // функция добавления строки атрибута
    function addRowAttributes(name, value) {
        if (countAttr < 5) {
            formRow = formRow.cloneNode(true)
            formRow.classList.remove('hidden')
            formRow.querySelector('.attr_name').value = name
            formRow.querySelector('.attr_value').value = value
            form__rows.append(formRow)
            formRow.querySelector('.form__basket').addEventListener('click', deleteFormRow)

            if (++countAttr === 5) {
                add_attr.classList.add('hidden')
            }
        }
    }
    // функция удаления строки аттрибута
    function deleteFormRow() {
        countAttr--
        this.parentElement.remove()
        add_attr.classList.remove('hidden')
    }

    // нажатие крестика
    btn_close.onclick = function () {
        clearForm()
        popik.style.display = 'none'

    }

    // форма добавления товара
    btn_add.onclick = function () {
        openForm()
        btn_form.innerText = 'Добавить'
        popik_title.textContent = 'Добавить продукт'
        input_status.setAttribute('value', 'Доступен')
        form.action = actionAdd
        form.style.display = 'flex'
        popik.style.display = 'block'
    }

    // редактирование продукта
    btn_pencil.onclick = function () {
        clearForm()
        openForm()
        popik_title.textContent = 'Редактировать ' + dataProduct.name
        btn_form.innerText = 'Сохранить'
        form.action = actionUpdate + dataProduct.id

        input_id.setAttribute('value', dataProduct.id)
        input_article.setAttribute('value', dataProduct.article)
        input_name.setAttribute('value', dataProduct.name)
        input_status.setAttribute('value', dataProduct.status)

        // добавление строк с атрибутами
        let arrayAttributes = dataProduct.data.split('\n');
        arrayAttributes = arrayAttributes.filter(Boolean)
        arrayAttributes.forEach(function (item) {
            let tempArray = item.split(':')
            addRowAttributes(tempArray[0], tempArray[1])
        })

        form.style.display = 'flex'
    }

    // функция очистки формы
    function clearForm() {
        form.querySelectorAll('input:not(:first-child)')
            .forEach(i => i.setAttribute('value', ''))
        form__rows.textContent = ''
        countAttr = 0
    }

    // функция открытия формы
    function openForm() {
        btn_pencil.style.display = 'none'
        btn_basket.style.display = 'none'
        popik__table.style.display = 'none'
    }
}
