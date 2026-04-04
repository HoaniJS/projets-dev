class Product {
    #id; #name; #price;

    constructor({ id, name, price }) {
        this.#id = id;
        this.setName(name);
        this.setPrice(price);
    }

    // ---------- Validation + Factory ----------
    static create({ id, name, price }) {
        if (typeof name !== "string" || !name.trim()) {
            throw new Error("Name must be a non-empty string");
        }
        if (typeof price !== "number" || price < 0) {
            throw new Error("Price must be a positive or null number");
        }
        return new Product({ id, name: name.trim(), price });
    }

    // ---------- Encapsulation ----------
    get id() { return this.#id; }
    get name(){ return this.#name; }
    get price() { return this.#price; }

    setName(name) {
        if (typeof name !== "string" || !name.trim()) throw new Error("Invalid name");
        this.#name = name.trim();
    }
    setPrice(price) {
        if (typeof price !== "number" || price < 0) throw new Error("Invalid price");
        this.#price = price;
    }

    toJSON() { return { id: this.#id, name: this.#name, price: this.#price }; }

    // ---------- "Persistance" en mémoire ----------
    static #data = [
        Product.create({ id: 1, name: "Phoenix Wright: Ace Attorney - Trials & Tribulations", price: 59.99 }),
        Product.create({ id: 2, name: "Kirby et le monde oublié + Le pays des étoiles filantes", price: 69.99 }),
        Product.create({ id: 3, name: "DELTARUNE", price: 24.99 }),
    ];

    static nextId() { return Date.now(); }

    static findAll() {
        return this.#data.map(p => p.toJSON());
    }

    static findById(id) {
        const p = this.#data.find(p => p.id === id);
        return p ? p.toJSON() : null;
    }

    static createOne({ name, price }) {
        const product = Product.create({ id: this.nextId(), name, price });
        this.#data.push(product);
        return product.toJSON();
    }

    static updateOne(id, dto) {
        const idx = this.#data.findIndex(p => p.id === id);
        if (idx === -1) return null;

        // Mise à jour avec validation via setters
        if (dto.name !== undefined) this.#data[idx].setName(dto.name);
        if (dto.price !== undefined) this.#data[idx].setPrice(dto.price);

        return this.#data[idx].toJSON();
    }

    static deleteOne(id) {
        const before = this.#data.length;
        this.#data = this.#data.filter(p => p.id !== id);
        return this.#data.length !== before; // true si supprimé
    }
}

module.exports = Product;