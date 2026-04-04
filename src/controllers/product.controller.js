const Product = require("../models/product.model");

exports.listProducts = (req, res, next) => {
    try {
        const { q, minPrice, maxPrice, limit = 50, offset = 0 } = req.query;
        let data = Product.findAll();
        
        // Petits filtres côté controller (démo simple)
        if (q) data = data.filter(u =>
            u.name.toLowerCase().includes(String(q).toLowerCase()));
        if (minPrice) data = data.filter(u => u.price >= Number(minPrice));
        if (maxPrice) data = data.filter(u => u.price <= Number(maxPrice));

        const start = Number(offset), end = start + Number(limit);
        sendHelpers(200, res, { total: data.length, data: data.slice(start, end) })
        // return res.status(200).json({ total: data.length, data: data.slice(start, end) });
    } catch (e) { next(e); }
};

exports.getProduct = (req, res, next) => {
    try {
        const product = Product.findById(Number(req.params.id));
        sendHelpers(200, res, product)
        // if (!product) return res.status(404).json({ error: "Produit non trouvé" });
        // return res.status(200).json(product);
    } catch (e) { next(e); }
};

exports.createProduct = (req, res, next) => {
    try {
        const { name, price } = req.body;
        if (name === undefined || price === undefined) {
            return res.status(400).json({ error: "name (string) et price (number) sont requis" });
        }
        const created = Product.createOne({ name, price });
        sendHelpers(201, res, created)
        // return res.status(201).json(created);
    } catch (e) { next(e); }
};

exports.updateProduct = (req, res, next) => {
    try {
        const updated = Product.updateOne(Number(req.params.id), req.body);
        sendHelpers(200, res, updated)
        // if (!updated) return res.status(404).json({ error: "Produit non trouvé" });
        // return res.status(200).json(updated);
    } catch (e) { next(e); }
};

exports.deleteProduct = (req, res, next) => {
    try {
        const ok = Product.deleteOne(Number(req.params.id));
        sendHelpers(204, res, ok)
        // if (!ok) return res.status(404).json({ error: "Produit non trouvé" });
        // return res.status(204).send();
    } catch (e) { next(e); }
};

function sendHelpers(helper, res, json) {
    if (!json) return res.status(404).json({ error: "Produit non trouvé" });
    if (helper == 204) return res.status(helper).send();
    else return res.status(helper).json(json);
}