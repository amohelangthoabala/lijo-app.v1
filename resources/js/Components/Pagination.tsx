import React from "react";
import { Pagination, PaginationContent, PaginationEllipsis, PaginationItem, PaginationLink, PaginationNext, PaginationPrevious } from "./ui/pagination";

const PaginationComponent = ({ links }) => {
  if (!links || links.length === 0) return null;

  return (
    <>
        <Pagination className="mt-4">
            <PaginationContent>
                <PaginationItem>
                    <PaginationPrevious href={links[0].url} />
                </PaginationItem>

                {links.slice(1, -1).map((link, index) => (
                <PaginationItem>
                    <PaginationLink href={link.url} isActive={link.active}>
                        {link.label}
                    </PaginationLink>
                </PaginationItem>
                ))}

                {/* <PaginationItem>
                    <PaginationEllipsis />
                </PaginationItem> */}
                <PaginationItem>
                    <PaginationNext href={links[links.length - 1].url} />
                </PaginationItem>
            </PaginationContent>
        </Pagination>

        {/* <div className="flex flex-wrap justify-center pt-6 md:flex-nowrap md:justify-end gap-y-6 gap-x-10"> */}
      {/* Page Numbers */}
      {/* <nav>
        <ul className="inline-flex items-center space-x-2 text-sm rounded-md">
          {links.map((link, index) => (
            <li key={index}>
              <a
                href={link.url || ""}
                className={`inline-flex items-center justify-center h-9 w-9 rounded-full transition-all duration-500 ${
                  link.active
                    ? "border border-primary text-white bg-primary"
                    : "bg-default-100 text-default-800 hover:bg-primary hover:border-primary hover:text-white"
                }`}
                dangerouslySetInnerHTML={{ __html: link.label }}
              ></a>
            </li>
          ))}
        </ul>
      </nav> */}

      {/* Next and Previous Navigation */}
      {/* <nav>
        <ul className="inline-flex items-center space-x-2 text-sm rounded-md"> */}
          {/* Previous */}
          {/* <li>
            <a
              href={
                links.find((link) => link.label === "&laquo;")?.url ||
                ""
              }
              className={`inline-flex items-center justify-center h-9 w-9 rounded-full transition-all duration-500 bg-default-100 text-default-800 ${
                links.find((link) => link.label === "&laquo;")?.url
                  ? "hover:bg-primary hover:border-primary hover:text-white"
                  : "cursor-not-allowed opacity-50"
              }`}
            >
              <i className="w-5 h-5" data-lucide="chevron-left"></i>
            </a>
          </li> */}
          {/* Next */}
          {/* <li>
            <a
              href={
                links.find((link) => link.label === "&raquo;")?.url ||
                ""
              }
              className={`inline-flex items-center justify-center h-9 w-9 rounded-full transition-all duration-500 bg-default-100 text-default-800 ${
                links.find((link) => link.label === "&raquo;")?.url
                  ? "hover:bg-primary hover:border-primary hover:text-white"
                  : "cursor-not-allowed opacity-50"
              }`}
            >
              <i className="w-5 h-5" data-lucide="chevron-right"></i>
            </a>
          </li>
        </ul>
      </nav>
    </div> */}
    </>

  );
};

export default PaginationComponent;
