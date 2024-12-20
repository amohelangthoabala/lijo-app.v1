import React from "react";
import {
  Pagination,
  PaginationContent,
  PaginationEllipsis,
  PaginationItem,
  PaginationLink,
  PaginationNext,
  PaginationPrevious,
} from "./ui/pagination";

// Define the type for the links prop
interface Link {
  url: string | null;
  label: string;
  active: boolean;
}

interface PaginationComponentProps {
  links: Link[]; // Array of Link objects
}

const PaginationComponent: React.FC<PaginationComponentProps> = ({ links }) => {
  if (!links || links.length === 0) return null;

  return (
    <>
      <Pagination className="mt-4">
        <PaginationContent>
          <PaginationItem>
            <PaginationPrevious href={links[0]?.url || "#"} />
          </PaginationItem>

          {links.slice(1, -1).map((link, index) => (
            <PaginationItem key={index}>
              <PaginationLink href={link.url || "#"} isActive={link.active}>
                {link.label}
              </PaginationLink>
            </PaginationItem>
          ))}

          {/* Uncomment if you need the ellipsis */}
          {/* <PaginationItem>
              <PaginationEllipsis />
          </PaginationItem> */}
          <PaginationItem>
            <PaginationNext href={links[links.length - 1]?.url || "#"} />
          </PaginationItem>
        </PaginationContent>
      </Pagination>
    </>
  );
};

export default PaginationComponent;
