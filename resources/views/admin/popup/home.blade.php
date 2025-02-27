<div id="popupOverlay"></div>
<div id="popupForm">
    <button id="closePopup" aria-label="Close">&times;</button>
    <h4>We're Here to Help</h4>
    <form id="enquiryForm">
        @csrf
        <input type="hidden" name="type" value="2" id="type">
        <div>
            <input type="text" id="name" name="name" placeholder="Enter Your Name" required>
        </div>
        <div>
            <input type="email" id="email" name="email" placeholder="Enter Your Mail*" required>
        </div>
        <div>
            <input type="tel" name="number" id="number" placeholder="Phone Number*" required pattern="[0-9]{10}">
        </div>
        <div>
            <select name="subject" id="subject" required>
                <option class="op" value="">Select Course*</option>
                <option class="op" value="mbbs">MBBS</option>
                <option class="op" value="bds">BDS</option>
                <option class="op" value="bums">BUMS</option>
                <option class="op" value="bhms">BHMS</option>
            </select>
        </div>
        <div>
            <textarea id="message" name="message" placeholder="Enter Your Message" required></textarea>
        </div>
        <button type="submit">Submit</button>
    </form>
</div>

<style>
    .op {
        color: black;
    }

    /* Overlay */
    #popupOverlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(5px);
        z-index: 999;
    }

    /* Popup Form */
    #popupForm {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 90%;
        max-width: 420px;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        padding: 25px;
        border-radius: 12px;
        text-align: center;
        animation: fadeIn 0.4s ease-out;
        z-index: 1000;
    }

    /* Title */
    #popupForm h4 {
        color: #fff;
        font-size: 22px;
        margin-bottom: 20px;
        font-weight: bold;
        letter-spacing: 1px;
    }

    /* Input Fields */
    input,
    select,
    textarea {
        width: 100%;
        padding: 12px;
        margin: 8px 0;
        border-radius: 8px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        background: rgba(255, 255, 255, 0.2);
        color: #fff;
        font-size: 16px;
        outline: none;
        transition: 0.3s;
    }

    input::placeholder,
    textarea::placeholder {
        color: rgba(3, 3, 3, 0.7);
    }

    input:focus,
    select:focus,
    textarea:focus {
        border-color: #0D5EF4;
        background: rgba(255, 255, 255, 0.3);
    }

    textarea {
        height: 100px;
        resize: none;
    }

    /* Submit Button */
    button[type="submit"] {
        width: 100%;
        padding: 12px;
        border: none;
        border-radius: 8px;
        background: linear-gradient(135deg, #0D5EF4, #0B4EC8);
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        text-transform: uppercase;
        cursor: pointer;
        transition: background 0.3s, transform 0.2s;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    button[type="submit"]:hover {
        background: linear-gradient(135deg, #0B4EC8, #0941A6);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    button[type="submit"]:active {
        transform: scale(0.98);
    }

    /* Close Button */
    #closePopup {
        position: absolute;
        top: 10px;
        right: 10px;
        background: transparent;
        border: none;
        font-size: 24px;
        font-weight: bold;
        color: #fff;
        cursor: pointer;
        transition: color 0.3s;
    }

    #closePopup:hover {
        color: #ff4d4d;
    }

    /* Animation */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translate(-50%, -55%);
        }

        to {
            opacity: 1;
            transform: translate(-50%, -50%);
        }
    }
</style>

<script>

    setTimeout(() => {
        document.getElementById('popupOverlay').style.display = 'block';
        document.getElementById('popupForm').style.display = 'block';
    }, 20000);

    document.getElementById('popupOverlay').addEventListener('click', () => {
        document.getElementById('popupOverlay').style.display = 'none';
        document.getElementById('popupForm').style.display = 'none';
    });

    closePopup.addEventListener('click', () => {
        document.getElementById('popupOverlay').style.display = 'none';
        document.getElementById('popupForm').style.display = 'none';
    });

    document.getElementById('enquiryForm').addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(e.target);
        const response = await fetch("{{ route('enquiry.contact') }}", {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            },
            body: formData
        });
        if (response.ok) {
            alert("Enquiry submitted successfully!");
            document.getElementById('popupOverlay').style.display = 'none';
            document.getElementById('popupForm').style.display = 'none';
        } else {
            alert("Failed to submit enquiry. Please try again.");
        }
    });
</script>