export default function ApplicationLogo(props) {
    return (
        <img
        {...props} // Pass additional props like `className`
        src="../../../public/logo lijo.png" // Update the path to match the PNG's location
        alt="Application Logo"
        className="h-20 w-20" // Tailwind classes for styling
    />
    );
}
