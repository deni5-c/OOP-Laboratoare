package school.laborator1;

public class Main {
    public static void main(String[] args) {
        // Create books
        Book book1 = new Book("Titlu1", "Autor1", "9780141182636");
        Book book2 = new Book("Titlu2", "Autor2", "0061120081\n");

        // Create library
        Library library = new Library();

        // Add books to the library
        library.addBook(book1);
        library.addBook(book2);
        System.out.println();

        // Display all books in the library
        library.displayAllBooks();

        // Remove a book from the library
        library.removeBook(book1);
        System.out.println();

        // Display all books after removal
        library.displayAllBooks();
    }
}