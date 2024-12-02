<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template Builder</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<div class="d-flex" style="min-height: 100vh;">
    <!-- Sidebar -->
    <div class="sidebar bg-light p-4" style="width: 300px; border-right: 1px solid #ddd;">
        <h4 class="mb-4">Edit Section</h4>
        <div id="form-container">
            <p class="text-muted">Click a section in the template to edit it.</p>
        </div>
    </div>

    <!-- Template Preview -->
    <div class="flex-grow-1 position-relative">
        <iframe 
            id="preview-iframe" 
            src="{{ url($template->file_path) }}" 
            class="w-100 h-100" 
            style="border: none;">
        </iframe>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
    const iframe = document.getElementById('preview-iframe');
    const formContainer = document.getElementById('form-container');

    // Forms for each section
    const forms = {
        Navbar: `
            <form action="{{ route('update.component', 'Navbar') }}" method="POST">
    @csrf
    <h5>Navbar Settings</h5>

    <!-- Logo -->
    <div class="mb-3">
        <label for="logo" class="form-label">Logo URL</label>
        <input type="text" name="logo" id="logo" class="form-control" value="{{ $componentsData['Navbar']['logo'] }}">
    </div>

    <!-- Links -->
    <h6>Navbar Links</h6>
    <div id="navbar-links-container">
        @foreach ($componentsData['Navbar']['links'] as $index => $link)
        <div class="navbar-link-item mb-3" data-index="{{ $index }}">
            <label for="link-text-{{ $index }}" class="form-label">Link Text</label>
            <input type="text" name="links[{{ $index }}][label]" id="link-text-{{ $index }}" class="form-control" value="{{ $link['label'] }}">
            
            
        </div>
        @endforeach
    </div>

    <!-- Submit -->
    <button type="submit" class="btn btn-primary">Save Navbar</button>
</form>

        `,
        Masthead: `
             <form action="{{ route('update.component', 'Masthead') }}" method="POST">
            @csrf
            <h5>Masthead Settings</h5>
            <div class="mb-3">
                <label for="masthead-subheading" class="form-label">Subheading</label>
                <input type="text" name="subheading" id="masthead-subheading" class="form-control" value="{{ $componentsData['Masthead']['subheading'] }}">
            </div>
            <div class="mb-3">
                <label for="masthead-heading" class="form-label">Heading</label>
                <input type="text" name="heading" id="masthead-heading" class="form-control" value="{{ $componentsData['Masthead']['heading'] }}">
            </div>
            <div class="mb-3">
                <label for="masthead-button-text" class="form-label">Button Text</label>
                <input type="text" name="buttonText" id="masthead-button-text" class="form-control" value="{{ $componentsData['Masthead']['buttonText'] }}">
            </div>
            <button type="submit" class="btn btn-primary">Save Masthead</button>
        </form>
        `,
        Services: `
        <form action="{{ route('update.component', 'Services') }}" method="POST">
            @csrf
            <h5>Services Section Settings</h5>
            <div class="mb-3">
                <label for="services-heading" class="form-label">Heading</label>
                <input type="text" name="heading" id="services-heading" class="form-control" value="{{ $componentsData['Services']['heading'] }}">
            </div>
            <div class="mb-3">
                <label for="services-subheading" class="form-label">Subheading</label>
                <input type="text" name="subheading" id="services-subheading" class="form-control" value="{{ $componentsData['Services']['subheading'] }}">
            </div>
            <h5 class="mt-4">Service Items</h5>
            @foreach ($componentsData['Services']['services'] as $index => $service)
            <div class="mb-4 border p-3 rounded">
                <h6>Service {{ $index + 1 }}</h6>
                <div class="mb-3">
                    <label for="service-icon-{{ $index }}" class="form-label">Icon Class</label>
                    <input type="text" name="services[{{ $index }}][icon]" id="service-icon-{{ $index }}" class="form-control" value="{{ $service['icon'] }}">
                </div>
                <div class="mb-3">
                    <label for="service-title-{{ $index }}" class="form-label">Title</label>
                    <input type="text" name="services[{{ $index }}][title]" id="service-title-{{ $index }}" class="form-control" value="{{ $service['title'] }}">
                </div>
                <div class="mb-3">
                    <label for="service-description-{{ $index }}" class="form-label">Description</label>
                    <textarea name="services[{{ $index }}][description]" id="service-description-{{ $index }}" class="form-control" rows="3">{{ $service['description'] }}</textarea>
                </div>
            </div>
            @endforeach
            <button type="submit" class="btn btn-primary mt-3">Save Services</button>
        </form>
    `,
    Portfolio: `
        <form action="{{ route('update.component', 'Portfolio') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h5>Portfolio Section Settings</h5>
            <div class="mb-3">
                <label for="portfolio-heading" class="form-label">Heading</label>
                <input type="text" name="heading" id="portfolio-heading" class="form-control" value="{{ $componentsData['Portfolio']['heading'] }}">
            </div>
            <div class="mb-3">
                <label for="portfolio-subheading" class="form-label">Subheading</label>
                <input type="text" name="subheading" id="portfolio-subheading" class="form-control" value="{{ $componentsData['Portfolio']['subheading'] }}">
            </div>
            <h5 class="mt-4">Portfolio Items</h5>
            @foreach ($componentsData['Portfolio']['items'] as $index => $item)
            <div class="mb-4 border p-3 rounded">
                <h6>Portfolio Item {{ $index + 1 }}</h6>
                <div class="mb-3">
                    <label for="portfolio-image-{{ $index }}" class="form-label">Image URL</label>
                    <input type="text" name="items[{{ $index }}][image]" id="portfolio-image-{{ $index }}" class="form-control" value="{{ $item['image'] }}">
                </div>
                <div class="mb-3">
                    <label for="portfolio-modal-{{ $index }}" class="form-label">Modal Link</label>
                    <input type="text" name="items[{{ $index }}][modal]" id="portfolio-modal-{{ $index }}" class="form-control" value="{{ $item['modal'] }}">
                </div>
                <div class="mb-3">
                    <label for="portfolio-caption-heading-{{ $index }}" class="form-label">Caption Heading</label>
                    <input type="text" name="items[{{ $index }}][captionHeading]" id="portfolio-caption-heading-{{ $index }}" class="form-control" value="{{ $item['captionHeading'] }}">
                </div>
                <div class="mb-3">
                    <label for="portfolio-caption-subheading-{{ $index }}" class="form-label">Caption Subheading</label>
                    <input type="text" name="items[{{ $index }}][captionSubheading]" id="portfolio-caption-subheading-{{ $index }}" class="form-control" value="{{ $item['captionSubheading'] }}">
                </div>
            </div>
            @endforeach
            <button type="submit" class="btn btn-primary mt-3">Save Portfolio</button>
        </form>
    `,
    About: `
    
    `
    };

    // Wait for the iframe to load
    iframe.addEventListener('load', () => {
        const iframeDoc = iframe.contentDocument || iframe.contentWindow.document;

        if (!iframeDoc) {
            console.error("Unable to access iframe content. Check for cross-origin restrictions.");
            return;
        }

        // Find all sections inside the iframe
        const sections = iframeDoc.querySelectorAll('.template-section');
        console.log("Found sections:", sections); // Debugging: Log found sections

        if (sections.length === 0) {
            console.warn("No sections with class 'template-section' found in iframe.");
        }

        sections.forEach(section => {
            section.style.cursor = 'pointer'; // Add pointer cursor to indicate clickable sections
            section.addEventListener('click', () => {
                const sectionName = section.getAttribute('data-section');
                console.log(`Clicked section: ${sectionName}`); // Debugging: Log the clicked section

                if (forms[sectionName]) {
                    formContainer.innerHTML = forms[sectionName];
                } else {
                    formContainer.innerHTML = `<p class="text-muted">No form available for the ${sectionName} section.</p>`;
                }
            });
        });
    });
});

</script>
</body>
</html>
