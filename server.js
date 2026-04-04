const express = require("express");
const app = express();
const PORT = 3000;

app.use(express.json()); // pour lire le JSON

app.get("/", (req, res) => {
    res.send("Bienvenue sur mon premier serveur Express 👋");
});

app.listen(PORT, () => {
    console.log(`Serveur démarré sur http://localhost:${PORT}`);
});

let users = [
    { id: 1, name: "Alice", age: 25 },
    { id: 2, name: "Bob", age: 30 }
];

const nextId = () => Date.now();

app.get("/api/users", (req, res) => {
    const { q, minAge } = req.query
    if (q || minAge) {
        let resQuery = []
        users.forEach(u => {
            if (q && !minAge && u.name.toLowerCase().includes(q.toLowerCase())) resQuery.push(u)
            else if (minAge && !q && parseInt(u.age) >= minAge) resQuery.push(u)
            else if (parseInt(u.age) >= minAge && u.name.toLowerCase().includes(q.toLowerCase())) resQuery.push(u)
        })
        if (resQuery.length === 0) return res.status(404).json({ error: "Utilisateurs non trouvé" });
        res.status(200).json(resQuery)
    }
    res.status(200).json(users);
});

app.get("/api/users/:id", (req, res) => {
    const id = Number(req.params.id);
    const user = users.find(u => u.id === id);
    if (!user) return res.status(404).json({ error: "Utilisateur non trouvé" });
    res.status(200).json(user);
});

app.post("/api/users", (req, res) => {
    const { name, age } = req.body;
    if (!name || typeof name !== "string") {
        return res.status(400).json({ error: "name (string) est requis" });
    }
    if (!age || typeof age !== "number") {
        return res.status(400).json({ error: "age (number) est requis" });
    }
    const newUser = { id: nextId(), name, age };
    users.push(newUser);
    res.status(201).json(newUser);
});

app.put("/api/users/:id", (req, res) => {
    const id = Number(req.params.id);
    const index = users.findIndex(u => u.id === id);
    if (index === -1) return res.status(404).json({ error: "Utilisateur non trouvé" });

    const { name, age } = req.body;
    users[index] = { id, name, age };
    res.status(200).json(users[index]);
});

app.delete("/api/users/:id", (req, res) => {
    const id = Number(req.params.id);
    const before = users.length;
    users = users.filter(u => u.id !== id);
    if (users.length === before) return res.status(404).json({ error: "Utilisateur non trouvé" });
    res.status(204).send();
});

app.use((req, res) => {
    res.status(404).json({ error: "Route inconnue" });
});