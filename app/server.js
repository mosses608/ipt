const express = require('express');
const bodyParser = require('body-parser');
const pdf = require('html-pdf');

const app = express();
app.use(bodyParser.json());

// Endpoint to convert HTML to PDF
app.post('/convert-to-pdf', (req, res) => {
    const contentHTML = req.body.content;

    // Generate PDF from HTML
    pdf.create(contentHTML).toBuffer((err, buffer) => {
        if (err) {
            console.error(err);
            res.status(500).send('Error generating PDF');
        } else {
            res.setHeader('Content-Type', 'application/pdf');
            res.send(buffer);
        }
    });
});

// Start the server
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});
