class CitySelect {
    constructor(container) {
        this.container = container;
        this.trigger = container.querySelector('.city-select__trigger');
        this.dropdown = container.querySelector('.city-select__dropdown');
        this.searchInput = container.querySelector('.city-select__search-input');
        this.options = container.querySelectorAll('.city-select__option');
        this.current = container.querySelector('.city-select__current');

        this.init();
    }

    init() {
        // Открытие/закрытие дропдауна
        this.trigger.addEventListener('click', (e) => {
            e.stopPropagation();
            this.toggle();
        });

        // Выбор города
        this.options.forEach(option => {
            option.addEventListener('click', () => {
                this.selectCity(option);
            });
        });

        // Поиск городов
        this.searchInput.addEventListener('input', () => {
            this.filterCities(this.searchInput.value.toLowerCase());
        });

        // Определение местоположения
        const detectBtn = this.container.querySelector('.city-select__detect');
        if (detectBtn) {
            detectBtn.addEventListener('click', () => {
                this.detectLocation();
            });
        }

        // Закрытие при клике вне дропдауна
        document.addEventListener('click', () => {
            this.close();
        });

        // Предотвращение закрытия при клике внутри дропдауна
        this.dropdown.addEventListener('click', (e) => {
            e.stopPropagation();
        });
    }

    toggle() {
        const isOpen = this.dropdown.getAttribute('data-state') === 'open';

        if (isOpen) {
            this.close();
        } else {
            this.open();
        }
    }

    open() {
        this.dropdown.setAttribute('data-state', 'open');
        this.trigger.setAttribute('aria-expanded', 'true');
        this.searchInput.focus();
    }

    close() {
        this.dropdown.setAttribute('data-state', 'closed');
        this.trigger.setAttribute('aria-expanded', 'false');
        this.searchInput.value = '';
        this.filterCities(''); // Сброс фильтра
    }

    selectCity(option) {
        const cityName = option.textContent.trim();
        const cityId = option.dataset.city;

        // Обновляем отображаемый город
        this.current.textContent = cityName;

        // Обновляем активный класс
        this.options.forEach(opt => opt.classList.remove('city-select__option_active'));
        option.classList.add('city-select__option_active');

        // Здесь можно добавить логику для сохранения выбора
        console.log('Выбран город:', cityName, cityId);

        // Закрываем дропдаун
        this.close();

        // Можно отправить событие о смене города
        this.container.dispatchEvent(new CustomEvent('cityChange', {
            detail: { city: cityName, id: cityId }
        }));
    }

    filterCities(query) {
        this.options.forEach(option => {
            const cityName = option.textContent.toLowerCase();
            if (cityName.includes(query)) {
                option.style.display = 'block';
            } else {
                option.style.display = 'none';
            }
        });
    }

    detectLocation() {
        // Эмуляция определения местоположения
        this.current.textContent = 'Определение...';

        setTimeout(() => {
            // В реальном приложении здесь будет API для геолокации
            const detectedCity = 'Москва';
            this.current.textContent = detectedCity;

            // Активируем соответствующий город в списке
            this.options.forEach(option => {
                if (option.textContent.trim() === detectedCity) {
                    option.classList.add('city-select__option_active');
                } else {
                    option.classList.remove('city-select__option_active');
                }
            });

            this.close();
        }, 1500);
    }
}

// Инициализация всех дропдаунов на странице
document.addEventListener('DOMContentLoaded', () => {
    const citySelects = document.querySelectorAll('.city-select');
    citySelects.forEach(select => new CitySelect(select));
});


// Слайдер "Популярные товары"
const popularProductsSwiper = new Swiper('.popular-products__slider', {
    slidesPerView: 'auto',
    spaceBetween: 0, // Отступы — через CSS
    loop: false,
    freeMode: true, // плавное движение и естественная прокрутка
    navigation: {
        nextEl: '.popular-products__button--next',
        prevEl: '.popular-products__button--prev',
    },
});

// Слайдер "Реализованные проекты"
const projectsSwiper = new Swiper('.projects__slider', {
    slidesPerView: 'auto',
    spaceBetween: 0, // Отступы — через CSS
    loop: false,
    freeMode: true, // плавное движение и естественная прокрутка
    navigation: {
        nextEl: '.projects__button--next', // уникальные кнопки
        prevEl: '.projects__button--prev', // уникальные кнопки
    },
});

// Слайдер "Отзывы"
const reviewsSwiper = new Swiper('.reviews__slider', {
    slidesPerView: 'auto',
    spaceBetween: 0,
    loop: false,
    freeMode: true,
    mousewheel: {
        forceToAxis: true,
        sensitivity: 0.5,
    },
    navigation: {
        nextEl: '.reviews__button--next',
        prevEl: '.reviews__button--prev',
    },
});

// Слайдер "Реализованные order"
const orderSwiper = new Swiper('.order__steps', {
    slidesPerView: 'auto',
    spaceBetween: 0,
    loop: true,
    freeMode: true,
    navigation: {
        nextEl: '.order__button--next',
        prevEl: '.order__button--prev',
    },
    enabled: true, // включаем только на мобильных
    breakpoints: {
        768: {
            enabled: false // отключаем на PC (от 768px и выше)
        }
    }
});

// Слайдер "Реализованные проекты"
const blogSwiper = new Swiper('.blog__slider', {
    slidesPerView: 'auto',
    spaceBetween: 0, // Отступы — через CSS
    loop: false,
    freeMode: true, // плавное движение и естественная прокрутка
    navigation: {
        nextEl: '.blog__button--next', // уникальные кнопки
        prevEl: '.blog__button--prev', // уникальные кнопки
    },
});

const header = document.querySelector('.header');
const headerHeight = header.offsetHeight;
let lastScroll = window.scrollY;

// Проверяем, был ли класс header--dark изначально
const hadHeaderDarkInitially = header.classList.contains('header--dark');

window.addEventListener('scroll', () => {
    const currentScroll = window.scrollY;
    const delta = currentScroll - lastScroll;
    const maxScroll = document.body.scrollHeight - window.innerHeight;

    // Определяем позицию шапки
    if (currentScroll <= 0) {
        header.style.transform = 'translateY(0)'; // На самом верху — полностью видна
    } else if (currentScroll >= maxScroll) {
        header.style.transform = `translateY(-${headerHeight}px)`; // Внизу — скрыта
    } else {
        // Между верхом и низом — "snap" по направлению скролла
        if (delta > 0) {
            header.style.transform = `translateY(-${headerHeight}px)`; // скролл вниз
        } else if (delta < 0) {
            header.style.transform = 'translateY(0)'; // скролл вверх
        }
    }

    // Управление классом header--dark — только если он был изначально
    if (hadHeaderDarkInitially) {
        const remInPx = parseFloat(getComputedStyle(document.documentElement).fontSize);
        const darkThreshold = 51.625 * remInPx - (headerHeight / 2);

        if (currentScroll <= darkThreshold) {
            header.classList.add('header--dark');
        } else {
            header.classList.remove('header--dark');
        }
    }

    lastScroll = currentScroll;
});


const accordionTriggers = document.querySelectorAll('.accordion__toggle, .accordion__question');

accordionTriggers.forEach(trigger => {
    trigger.addEventListener('click', function (event) {
        const accordion = this.closest('.accordion');
        accordion.classList.toggle('__active');
    });
});

window.addEventListener('DOMContentLoaded', () => {
    const modals = document.querySelectorAll('.modal');
    const openButtons = document.querySelectorAll('[data-modal]');
    const closeButtons = document.querySelectorAll('.modal__close, .modal__overlay');

    // Функция для закрытия всех модальных окон
    function closeAllModals() {
        modals.forEach(modal => {
            modal.classList.remove('modal--visible');
        });
        document.body.style.overflow = ''; // Разблокируем прокрутку страницы
    }

    openButtons.forEach(button => {
        button.addEventListener('click', () => {
            console.log('Open modal:', button);
            const modalId = button.getAttribute('data-modal');
            const modal = document.getElementById(modalId);
            if (modal) {
                // Закрываем все модальные окна перед открытием нового
                closeAllModals();
                // Открываем нужное модальное окно
                modal.classList.add('modal--visible');
                document.body.style.overflow = 'hidden'; // Блокируем прокрутку страницы
            }
        });
    });

    closeButtons.forEach(button => {
        button.addEventListener('click', () => {
            const modal = button.closest('.modal');
            if (modal) {
                modal.classList.remove('modal--visible');
                document.body.style.overflow = ''; // Разблокируем прокрутку страницы
            }
        });
    });

    // Закрытие по нажатию Esc
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeAllModals();
        }
    });
});


let breadcrumbs = document.querySelector('.breadcrumbs');

if (breadcrumbs) {
    breadcrumbs.style.paddingTop = `${headerHeight}px`;
}


// Сортировка
document.addEventListener('DOMContentLoaded', () => {
    const sort = document.querySelector('[data-sort]');
    const toggle = sort.querySelector('.catalog-sort__toggle');
    const menu = sort.querySelector('.catalog-sort__menu');
    const current = sort.querySelector('.catalog-sort__current');
    const options = sort.querySelectorAll('.catalog-sort__option');

    // Открыть/закрыть меню
    toggle.addEventListener('click', () => {
        const expanded = toggle.getAttribute('aria-expanded') === 'true';
        toggle.setAttribute('aria-expanded', String(!expanded));
        menu.classList.toggle('catalog-sort__menu--open', !expanded);
    });

    // Выбор пункта
    options.forEach(option => {
        option.addEventListener('click', () => {
            options.forEach(o => o.classList.remove('catalog-sort__option--selected'));
            options.forEach(o => o.setAttribute('aria-selected', 'false'));

            option.classList.add('catalog-sort__option--selected');
            option.setAttribute('aria-selected', 'true');

            current.textContent = option.textContent;

            toggle.setAttribute('aria-expanded', 'false');
            menu.classList.remove('catalog-sort__menu--open');

            // (Можно добавить логику сортировки здесь)
            console.log('Выбрано значение:', option.dataset.value);
        });
    });

    // Закрытие при клике вне
    document.addEventListener('click', (e) => {
        if (!sort.contains(e.target)) {
            toggle.setAttribute('aria-expanded', 'false');
            menu.classList.remove('catalog-sort__menu--open');
        }
    });
});

// Категории
document.querySelectorAll('.categories__toggle').forEach(btn => {
    btn.addEventListener('click', e => {
        e.preventDefault();
        e.stopPropagation();

        const item = btn.closest('.categories__item');
        const sublist = item.querySelector('.categories__sublist');
        const expanded = btn.getAttribute('aria-expanded') === 'true';
        const rootFontSize = parseFloat(getComputedStyle(document.documentElement).fontSize); // px

        const style = getComputedStyle(sublist);
        const gap = parseFloat(style.rowGap || style.gap || 0);

        const totalHeight = sublist.scrollHeight + gap * (sublist.children.length - 1);

        btn.setAttribute('aria-expanded', String(!expanded));

        if (!expanded) {
            // открываем: вычисляем высоту контента
            // sublist.style.maxHeight = sublist.scrollHeight + "rem";
            sublist.style.maxHeight = (totalHeight / rootFontSize) + "rem";
            item.classList.add('categories__item-open');
        } else {
            // закрываем: убираем max-height для плавного закрытия
            sublist.style.maxHeight = "0rem";
            item.classList.remove('categories__item-open');
        }
    });
});

// Фильтры
document.querySelectorAll('.filter-group__toggle').forEach(btn => {
    btn.addEventListener('click', () => {
        const group = btn.closest('.filter-group');
        const target = document.getElementById(btn.getAttribute('aria-controls'));
        const expanded = btn.getAttribute('aria-expanded') === 'true';
        const rootFontSize = parseFloat(getComputedStyle(document.documentElement).fontSize); // px

        const style = getComputedStyle(target);
        const gap = parseFloat(style.rowGap || style.gap || 0);

        const totalHeight = target.scrollHeight + gap * (target.children.length - 1);

        btn.setAttribute('aria-expanded', String(!expanded));

        if (!expanded) {
            // открываем: выставляем max-height по контенту
            // target.style.maxHeight = target.scrollHeight + "rem";
            target.style.maxHeight = (totalHeight / rootFontSize) + "rem";
            group.classList.add('filter-group-open');
        } else {
            // закрываем: max-height = 0
            target.style.maxHeight = "0rem";
            group.classList.remove('filter-group-open');
        }
    });
});

document.querySelectorAll('.product-card__favorite').forEach(btn => {

    btn.addEventListener('click', () => {
        btn.classList.toggle('product-card__favorite-active');
        
    });

});





document.addEventListener('DOMContentLoaded', function() {
    console.log('Infinite Scroll: Script loaded');
    
    let isLoading = false;
    const dataElement = document.getElementById('infinite-scroll-data');
    const loader = document.getElementById('infinite-scroll-loader');
    
    if (!dataElement) return;
    
    let currentPage = parseInt(dataElement.dataset.page);
    const maxPages = parseInt(dataElement.dataset.maxPages);
    const categoryId = dataElement.dataset.category;
    const ajaxUrl = dataElement.dataset.ajaxUrl;

    function loadMoreProducts() {
        if (isLoading || currentPage > maxPages) return;
        
        isLoading = true;
        console.log('Loading page:', currentPage);
        
        if (loader) loader.style.display = 'block';
        
        const formData = new FormData();
        formData.append('action', 'load_more_products');
        formData.append('page', currentPage);
        formData.append('posts_per_page', 12);
        if (categoryId) {
            formData.append('category', categoryId);
        }
        
        fetch(ajaxUrl, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success && data.data.html) {
                const productsContainer = document.getElementById('products-container');
                if (productsContainer) {
                    productsContainer.insertAdjacentHTML('beforeend', data.data.html);
                    
                    // Создаем новый наблюдатель для последнего элемента
                    setTimeout(() => {
                        const lastProduct = productsContainer.lastElementChild;
                        if (lastProduct) {
                            observer.observe(lastProduct);
                        }
                    }, 100);
                }
                
                currentPage++;
                dataElement.dataset.page = currentPage;
                
                if (currentPage > maxPages) {
                    observer.disconnect();
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
        })
        .finally(() => {
            isLoading = false;
            if (loader) loader.style.display = 'none';
        });
    }

    // Используем Intersection Observer для наблюдения за последним товаром
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !isLoading && currentPage <= maxPages) {
                console.log('Last product is visible, loading more...');
                loadMoreProducts();
            }
        });
    }, {
        rootMargin: '100px' // Начинаем загрузку за 100px до появления элемента
    });

    // Начинаем наблюдение за последним товаром
    const productsContainer = document.getElementById('products-container');
    if (productsContainer && productsContainer.lastElementChild) {
        observer.observe(productsContainer.lastElementChild);
        console.log('Observer started watching last product');
    }
});
