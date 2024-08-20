class Lightbox {
    static init() {
        const triFilters = document.querySelectorAll('.tri__filter');
        triFilters.forEach(triFilter => {
            triFilter.addEventListener('click', function(){
                const links = Array.from(document.querySelectorAll('.fullscreen'));
                const galerie = links.map(link => ({
                    url: link.getAttribute('data-img'),
                    ref: link.getAttribute('data-ref'),
                    cat: link.getAttribute('data-cat')
                }));

                links.forEach(link => {
                    link.addEventListener('click', e => {
                        e.preventDefault();
                        if (!document.querySelector('.lightbox')) {
                            new Lightbox(e.currentTarget.getAttribute('data-img'), galerie);
                        }
                    });
                });
            });
        });

        const fullscreens = document.querySelectorAll('.fullscreen');
        fullscreens.forEach(fullscreen => {
            fullscreen.addEventListener('click', function(e) {
                e.preventDefault();
                if (!document.querySelector('.lightbox')) {
                    const galerie = Array.from(document.querySelectorAll('.fullscreen')).map(link => ({
                        url: link.getAttribute('data-img'),
                        ref: link.getAttribute('data-ref'),
                        cat: link.getAttribute('data-cat')
                    }));
                    new Lightbox(fullscreen.getAttribute('data-img'), galerie);
                }
            });
        });
    }

    constructor(url, galerie) {
        this.url = url;
        this.galerie = galerie;
        this.element = this.buildDOM(url, galerie[0].ref, galerie[0].cat);
        this.closeButton = this.element.querySelector('.lightbox__button-close');
        this.prevButton = this.element.querySelector('.lightbox__button-prev');
        this.nextButton = this.element.querySelector('.lightbox__button-next');
        this.closeButton.addEventListener('click', this.close.bind(this));
        this.prevButton.addEventListener('click', this.prev.bind(this));
        this.nextButton.addEventListener('click', this.next.bind(this));
        document.body.appendChild(this.element);
    }

    close(e) {
        e.preventDefault();
        this.element.remove();
        this.closeButton.removeEventListener('click', this.close.bind(this));
        this.prevButton.removeEventListener('click', this.prev.bind(this));
        this.nextButton.removeEventListener('click', this.next.bind(this));
    }

    next(e) {
        e.preventDefault();
        let i = this.galerie.findIndex(img => img.url === this.url);
        if (i === this.galerie.length - 1) {
            i = 0;
        } else {
            i++;
        }
        this.url = this.galerie[i].url;
        this.element.querySelector('img').src = this.url;
        this.updateInfo(this.galerie[i].ref, this.galerie[i].cat);
    }

    prev(e) {
        e.preventDefault();
        let i = this.galerie.findIndex(img => img.url === this.url);
        if (i === 0) {
            i = this.galerie.length - 1;
        } else {
            i--;
        }
        this.url = this.galerie[i].url;
        this.element.querySelector('img').src = this.url;
        this.updateInfo(this.galerie[i].ref, this.galerie[i].cat);
    }

    buildDOM(url, ref, cat) {
        const dom = document.createElement('div');
        dom.classList.add('lightbox');
        dom.innerHTML = `
            <div class="lightbox__button lightbox__button-close"></div>
            <div class="lightbox__button lightbox__button-prev"></div>
            <div class="lightbox__button lightbox__button-next"></div>
            <div class="lightbox__content">
                <img src="${url}" alt="">
                <div class="lightbox__content-sub">
                    <span class="lightbox__ref">${ref}</span>
                    <span class="lightbox__cat">${cat}</span>
                </div>
            </div>`;
        return dom;
    }

    updateInfo(ref, cat) {
        const refSpan = this.element.querySelector('.lightbox__ref');
        const catSpan = this.element.querySelector('.lightbox__cat');
        refSpan.textContent = ref;
        catSpan.textContent = cat;
    }
}

Lightbox.init();
