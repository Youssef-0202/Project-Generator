<footer class="custom-footer text-center">
    <p>&copy; 2024 WebsiteGen. All rights reserved.</p>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="logout-button">Logout</button>
    </form>
</footer>
<style>
    .custom-footer {
        background-color: #F4F4F4; /* Soft light grey for the footer */
        color: #333333; /* Dark text for contrast */
        padding: 20px 0;
        font-family: 'Poppins', sans-serif;
    }

    .custom-footer p {
        margin: 0;
        color: #777777; /* Slightly lighter grey text */
    }

    .custom-footer a {
        color: #5E8F85; /* Soft teal for any links */
        text-decoration: none;
    }

    .custom-footer a:hover {
        color: #FFD700; /* Hover effect for links */
    }

    .logout-button {
        background: none;
        border: none;
        color: #5E8F85;
        font-size: 16px;
        cursor: pointer;
        font-family: 'Poppins', sans-serif;
    }

    .logout-button:hover {
        color: #FFD700;
    }
</style>
